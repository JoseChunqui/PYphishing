# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from django.core import serializers
import json
import datetime

from django_mailbox.models import Message
from django_mailbox.models import Mailbox

from phishing.models import Analyzed


# Create your views here.
def datetime_handler(x):
    if isinstance(x, datetime.datetime):
        return x.isoformat()
    raise TypeError("Unknown type")

def index(request):

    if request.user.is_authenticated():
        current_email = request.user.email
        mailbox = Mailbox.objects.all()
        mailbox_current = [x.id for x in mailbox if x.username == current_email]
        mailbox = mailbox.filter(id__in=mailbox_current).first()
        messages = mailbox.messages.order_by('-id')

        for message in messages:
            # print message.mailbox.username
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
                #analize msg_text = message.text
                pass

            if is_phishing:
                #do anithing
                pass
            # print request.user.email if request.user.is_authenticated() else 'no loggin user'
            #
            # pass

        #end for messages
        analyzed_all = Analyzed.objects.all()

        emails = []

        for analyzed in analyzed_all:
            email = {}
            email['subject'] = analyzed.message.subject
            email['from'] = analyzed.message.from_header
            email['processed'] = analyzed.message.processed
            email['html'] = analyzed.message.html
            email['is_phishing'] = False
            emails.append(email)

        context = {'emails': json.dumps(emails, default=datetime_handler)}
        return render(request, 'index.html', context)
    else:
        context = {'messages': []}
        return render(request, 'index.html', context)
