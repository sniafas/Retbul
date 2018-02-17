#!/usr/bin/env python

import glob
import numpy as np
from json_tricks.np import dump, load
import json
import subprocess

def dc(index,image_id,building):

    dtList[index][0] = index
    dtList[index][1] = image_id
    dtList[index][2] = building


if __name__ == '__main__':

    dataset = []
    dataset_dict = {}
    listImages = (subprocess.check_output(["ls Vyronasdbmin/", "-x"], shell=True))

    #listImages = glob.glob('Vyronasdbmin/*[0-9].*')
    for i in listImages.splitlines():
        dataset.append(i)

    dtList = np.zeros( len(dataset) , [('idx', 'int16'), ('imageId', 'a28'), ('building', 'int8') ])
    
    i = 0
    for im in dataset:
        dc(i,im,im[8:10])
        i = i + 1

    dataset_dict["dataset"] = dtList
    #dataset_dict["Houseid"] = dtList[:][8:10]

    '''
    for f,h in dataset_dict.iteritems():
        
        print f
        print h
        #print(dataset_dict)

    
    rList = np.sort(dtList, order= 'building')[::1]
    #print(dtList[0:14])
    #print(rList[0:14])
    '''
    with open('vyronas_dataset.json','w') as resultFile:
        dump( dataset_dict, resultFile, indent=4, sort_keys=True)    
    