# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render

#Make a test response
from django.http import HttpResponse

# Weka modules
from weka.core.converters import Loader
from weka.classifiers import Classifier
import weka.core.serialization as serialization
from weka.core.dataset import Instances
from weka.core.dataset import Instance
from weka.core.dataset import Attribute
import weka.core.jvm as jvm

def train(request):

    jvm.start()

    d_att1 = Attribute.create_numeric("bodydearword.feature")
    d_att2 = Attribute.create_numeric("bodyform.feature")
    d_att3 = Attribute.create_numeric("bodyhtml.feature")
    d_att4 = Attribute.create_numeric("bodymultipart.feature")
    d_att5 = Attribute.create_numeric("bodynumchars.feature")
    d_att6 = Attribute.create_numeric("bodynumfunctionwords.feature")
    d_att7 = Attribute.create_numeric("bodynumuniqwords.feature")
    d_att8 = Attribute.create_numeric("bodynumwords.feature")
    d_att9 = Attribute.create_numeric("bodyrichness.feature")
    d_att10 = Attribute.create_numeric("bodysuspensionword.feature")
    d_att11 = Attribute.create_numeric("bodyverifyyouraccountphrase.feature")
    d_att12 = Attribute.create_numeric("externalsabinary.feature")
    d_att13 = Attribute.create_numeric("externalsascore.feature")
    d_att14 = Attribute.create_numeric("scriptjavascript.feature")
    d_att15 = Attribute.create_numeric("scriptonclick.feature")
    d_att16 = Attribute.create_numeric("scriptpopup.feature")
    d_att17 = Attribute.create_numeric("scriptstatuschange.feature")
    d_att18 = Attribute.create_numeric("scriptunmodalload.feature")
    d_att19 = Attribute.create_numeric("senddiffreplyto.feature")
    d_att20 = Attribute.create_numeric("sendnumwords.feature")
    d_att21 = Attribute.create_numeric("sendunmodaldomain.feature")
    d_att22 = Attribute.create_numeric("subjectbankword.feature")
    d_att23 = Attribute.create_numeric("subjectdebitword.feature")
    d_att24 = Attribute.create_numeric("subjectfwdword.feature")
    d_att25 = Attribute.create_numeric("subjectnumchars.feature")
    d_att26 = Attribute.create_numeric("subjectnumwords.feature")
    d_att27 = Attribute.create_numeric("subjectreplyword.feature")
    d_att28 = Attribute.create_numeric("subjectrichness.feature")
    d_att29 = Attribute.create_numeric("subjectverifyword.feature")
    d_att30 = Attribute.create_numeric("urlatchar.feature")
    d_att31 = Attribute.create_numeric("urlbaglink.feature")
    d_att32 = Attribute.create_numeric("urlip.feature")
    d_att33 = Attribute.create_numeric("urlnumdomains.feature")
    d_att34 = Attribute.create_numeric("urlnumexternallink.feature")
    d_att35 = Attribute.create_numeric("urlnumimagelink.feature")
    d_att36 = Attribute.create_numeric("urlnuminternallink.feature")
    d_att37 = Attribute.create_numeric("urlnumip.feature")
    d_att38 = Attribute.create_numeric("urlnumlink.feature")
    d_att39 = Attribute.create_numeric("urlnumperiods.feature")
    d_att40 = Attribute.create_numeric("urlnumport.feature")
    d_att41 = Attribute.create_numeric("urlport.feature")
    d_att42 = Attribute.create_numeric("urltwodoains.feature")
    d_att43 = Attribute.create_numeric("urlunmodalbaglink.feature")
    d_att44 = Attribute.create_numeric("urlwordclicklink.feature")
    d_att45 = Attribute.create_numeric("urlwordherelink.feature")
    d_att46 = Attribute.create_numeric("urlwordloginlink.feature")
    d_att47 = Attribute.create_numeric("urlwordupdatelink.feature")
    d_att48 = Attribute.create_nominal("class", {'phish', 'ham'})
    #
    data_dir = settings.BASE_DIR + "/phishing/public/datasets/"
    #
    loader = Loader(classname="weka.core.converters.ArffLoader")
    data = loader.load_file(data_dir + "dataset.arff")
    data.class_is_last()
    cls = Classifier(classname="weka.classifiers.trees.J48")
    cls.options = ["-C", "0.3"]
    cls.build_classifier(data)

    serialization.write(data_dir + "out.model", cls)
    classifier = Classifier(jobject=serialization.read(data_dir + "out.model"))

    dataset = Instances.create_instances("test", [d_att1, d_att2, d_att3, d_att4, d_att5, d_att6, d_att7, d_att8, d_att9, d_att10, d_att11, d_att12, d_att13, d_att14, d_att15, d_att16, d_att17, d_att18, d_att19, d_att20, d_att21, d_att22, d_att23, d_att24, d_att25, d_att26, d_att27, d_att28, d_att29, d_att30, d_att31, d_att32, d_att33, d_att34, d_att35, d_att36, d_att37, d_att38, d_att39, d_att40, d_att41, d_att42, d_att43, d_att44, d_att45, d_att46, d_att47, d_att48], 0)
    values = [0,0,0,0,890,1,124,198,0.22247191011236,0,0,0,0.0,0,0,0,0,0,1,4,0,0,0,0,21,4,1,0.19047619047619,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,Instance.missing_value()]
    inst = Instance.create_instance(values)
    dataset.add_instance(inst)
    dataset.class_is_last()
    # print(str(dataset))
    var = ''
    for inst1 in dataset:
        pred = classifier.classify_instance(inst1)
        var = inst1.class_attribute.value(int(pred))
        if var == 'ham':
            print('No es pishing')
            # do somthing
        else:
            print('Es pishing')
            # do somthing

        print(var)

    jvm.stop()

    return HttpResponse(str(var))
