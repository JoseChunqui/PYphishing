# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from __future__ import division

from django.shortcuts import render
from django.shortcuts import redirect

from django.core import serializers
from bs4 import BeautifulSoup
import json
import datetime
import re


from django_mailbox.models import Message
from django_mailbox.models import Mailbox
from django.http import HttpResponse

from phishing.models import Analyzed
from .app.ia.sk_modules import detector

from django.contrib.auth.decorators import login_required
from django.contrib.auth import authenticate, login, logout

# Create your views here.
def datetime_handler(x):
    if isinstance(x, datetime.datetime):
        return x.isoformat()
    raise TypeError("Unknown type")


@login_required(login_url='/login')
def index(request):

    if request.user.is_authenticated():
        current_email = request.user.email
        mailbox = Mailbox.objects.all()
        mailbox_current = [x.id for x in mailbox if x.username == current_email]
        mailbox = mailbox.filter(id__in=mailbox_current).first()
        messages = mailbox.messages.order_by('-id')
        # Analyzed.objects.all().delete()
        # print messages[0].get_body()
        for message in messages:
            analyzed = Analyzed.objects.filter(message_id=message.id).first()

            turn_to_analyze = False

            if not analyzed:
                new_analyzed = Analyzed(message_id=message.id, analyzed=False)
                new_analyzed.save()
                analyzed = new_analyzed
                turn_to_analyze = True
            else:
                if not analyzed.analyzed:
                    turn_to_analyze = True

            is_phishing = False

            if turn_to_analyze:
                attr_array = get_attr_from_email(message)
                result = detector(attr_array)
                # print message.subject
                # print result
                if not result == 'ham':
                    analyzed.data = 'pishing'
                else:
                    analyzed.data = 'ham'
                #endif
                analyzed.save()
            #endif
        #end for messages

        analyzed_all = Analyzed.objects.order_by('-id')

        emails = []

        for analyzed in analyzed_all:
            email = {}
            email['id'] = analyzed.message.id
            email['subject'] = analyzed.message.subject
            email['from'] = analyzed.message.from_header
            email['processed'] = analyzed.message.processed
            email['is_phishing'] = analyzed.data
            emails.append(email)

        context = {'emails': json.dumps(emails, default=datetime_handler)}
        return render(request, 'index.html', context)
    else:
        context = {'messages': []}
        return render(request, 'index.html', context)

def show(request):
    message_id = request.GET.get('message_id')
    analyzed = Analyzed.objects.filter(message_id=message_id).first()
    bytes = analyzed.message.html.encode('utf-8')
    return HttpResponse(bytes, content_type='application/json')

def get_attr_from_email(message):
    # We will get these attr from email text:
    # ---------------------------------------------
    # @attribute bodydearword.feature numeric
    # @attribute bodyhtml.feature numeric
    # @attribute bodysuspensionword.feature numeric
    # @attribute externalsabinary.feature numeric
    # @attribute scriptonclick.feature numeric
    # @attribute scriptstatuschange.feature numeric
    # @attribute sendnumwords.feature numeric
    # @attribute subjectbankword.feature numeric
    # @attribute subjectrichness.feature numeric
    # @attribute subjectverifyword.feature numeric
    # @attribute urlnumip.feature numeric
    # @attribute urlnumlink.feature numeric
    # @attribute class {ham,phish}
    # -----------------------------------------------

    attr_array = {}

    # bodydearword
    if ('dear' in message.text) or ('Dear' in message.text):
        attr_array['bodydearword'] = 1
    else:
        attr_array['bodydearword'] = 0
    #

    #bodyhtml !!useless feature
    if 'Content-type: text/html' in message.get_body():
        attr_array['bodyhtml'] = 1
    else:
        attr_array['bodyhtml'] = 0
    #

    #bodysuspensionword
    if ('suspension' in message.text) or ('Suspension' in message.text):
        attr_array['bodysuspensionword'] = 1
    else:
        attr_array['bodysuspensionword'] = 0
    #

    #externalsabinary !!FALID
    if 'X-Spam-Status: No' in message.get_body():
        attr_array['externalsabinary'] = 0
    else:
        attr_array['externalsabinary'] = 0

    #scriptonclick !! Posible Incomplete
    if 'onclick' in message.html:
        attr_array['scriptonclick'] = 1
    else:
        attr_array['scriptonclick'] = 0
    #

    #scriptstatuschange !!Incomplete
    if 'window.status' in message.html:
        attr_array['scriptstatuschange'] = 1
    else:
        attr_array['scriptstatuschange'] = 0
    #

    #sendnumwords
    attr_array['sendnumwords'] = len(re.findall(r'\w+', message.from_header))

    #subjectbankword
    if 'bank' in message.subject or 'Bank' in message.subject:
        attr_array['subjectbankword'] = 1
    else:
        attr_array['subjectbankword'] = 0
    #

    #subjectrichness
    attr_array['subjectrichness'] = (len(re.findall(r'\w+', message.subject))) / (len(re.findall('[a-zA-Z]', message.subject)))

    #subjectverifyword
    if 'verif' in message.subject or 'Verif' in message.subject:
        attr_array['subjectverifyword'] = 1
    else:
        attr_array['subjectverifyword'] = 0
    #

    #urlnumip !!authority portion (?) (useless)
    attr_array['urlnumip'] = len(re.findall(r'(?:\d{1,3}\.)+(?:\d{1,3})', message.text))

    #urlnumlink
    attr_array['urlnumlink'] = len(re.findall('http[s]?://(?:[a-zA-Z]|[0-9]|[$-_@.&+]|[!*\(\),]|(?:%[0-9a-fA-F][0-9a-fA-F]))+', message.html))

    return attr_array



# Custom Auntenticate System
def custom_login(request):
    logout(request)
    username = password = ''
    if request.POST:
        username = request.POST['username']
        password = request.POST['password']

        user = authenticate(username=username, password=password)
        if user is not None:
            login(request, user)
            return redirect('/')
        #
    #
    else:
        return render(request, 'login.html')
