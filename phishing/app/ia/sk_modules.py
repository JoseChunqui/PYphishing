# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render

#Make a test response
from django.http import HttpResponse

from django.conf import settings

# SKLEARN libraries
from sklearn import tree
from scipy.io import arff
import numpy as np
from sklearn_porter import Porter
from sklearn.externals import joblib

def train(request):
    data_dir = settings.BASE_DIR + "/phishing/app/ia/datasets/"
    models_dir = settings.BASE_DIR + "/phishing/app/ia/models/"
    # data, meta = arff.loadarff(data_dir + "dataset.arff" )
    data, meta = arff.loadarff(data_dir + "dataset_modificado.arff" )

    array_data = data.tolist()
    dataset_array = [i[:-1] for i in array_data]
    target_array = [i[-1] for i in array_data]

    dataset = np.asarray(dataset_array, dtype=np.float64)
    target = np.asarray(target_array, dtype=str)

    clf = tree.DecisionTreeClassifier()
    clf = clf.fit(dataset, target)

    joblib.dump(clf, models_dir + 'tree_model.pkl')

    # build model in PHP
    porter = Porter(clf, language='php')
    output = porter.export(embedded=True)
    php_file = open(models_dir + 'model_php.php', "w")
    php_file.write(output)
    php_file.close()

    return HttpResponse('Model builded')

def detector(attr_array):
    data_dir = settings.BASE_DIR + "/phishing/app/ia/models/"
    # test = np.array([(0,0,1,1,273,0,37,62,0.227106227106227,0,0,1,22.1,0,0,0,0,0,1,0,0,0,0,0,22,-1,0,-0.0454545454545455,0,0,0,0,4,0,3,0,0,4,3,0,0,0,0,0,0,0,0)])
    # test = np.array([(0,0,0,0,0,0,4,0,0.190476,0,0,0)])
    test = np.array([(attr_array['bodydearword'], attr_array['bodyhtml'], attr_array['bodysuspensionword'], attr_array['externalsabinary'], attr_array['scriptonclick'], attr_array['scriptstatuschange'], attr_array['sendnumwords'], attr_array['subjectbankword'], attr_array['subjectrichness'], attr_array['subjectverifyword'], attr_array['urlnumip'], attr_array['urlnumlink'])])
    # print attr_array
    clf = joblib.load(data_dir + 'tree_model.pkl')
    pred = clf.predict(test)
    #
    # if pred[0] == 'ham':
    #     print('No es pishing')
    #     # do somthing
    # else:
    #     print('Es pishing')
    #     # do somthing
    #
    return pred[0]

def do_nothing():
    var = 'Nothing'
    return var

def is_ham_actions():
    pass

def is_phishing_actions():
    pass
