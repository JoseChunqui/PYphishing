from django.conf.urls import url
from django.views.generic.base import RedirectView

from . import views

from .app.ia import sk_modules


urlpatterns = [
    url(r'^$', views.index, name='index'),
    #Test modules
    url(r'sklearn/train/', sk_modules.train, name='sklearn.train'),
    url(r'sklearn/detector/', sk_modules.detector, name='sklearn.detector'),
]
