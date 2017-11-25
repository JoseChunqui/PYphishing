# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models
from django_mailbox.models import Message

# Create your models here.

class Analyzed(models.Model):
    message = models.ForeignKey(Message, on_delete=models.CASCADE)
    analyzed = models.BooleanField(default=False)
    data = models.TextField(null=True)
