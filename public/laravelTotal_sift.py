#!/usr/bin/env python

'''
sift detector demo
==================

Usage:
------
    sift.py []
Keys:
'''

import datetime,time
from time import sleep
from tqdm import trange
import os,sys, getopt
import numpy as np
import cv2
import subprocess
from json_tricks.np import dump, dumps, load, loads, strip_comments
import json

queryImg = ''
nFeatures = 0
nOctaveLayers = 3
contrastThres = 0.08
edgeThres = 8
rawMatches = 1

def filter_rawMatches(kp1, kp2, matches, ratio = 0.75):

	mkp1, mkp2 = [], []
	
	for r in range(len(matches)-1):
		#print matches[r].distance
		#print matches[r+1].distance

		if matches[r].distance < ratio * matches[r+1].distance:
			m = matches[r]
			mkp1.append(kp1[m.queryIdx])
			mkp2.append(kp2[m.trainIdx])
	
	p1 = np.float32([kp.pt for kp in mkp1])
	p2 = np.float32([kp.pt for kp in mkp2])
	kp_pairs = zip(mkp1, mkp2)	

	return p1,p2,kp_pairs

def rankingList(index,image_id,n_inliers,percent,building):

	resList[index][0] = index
	resList[index][1] = image_id
	resList[index][2] = n_inliers
	resList[index][3] = percent
	resList[index][4] = building

if __name__ == '__main__':

	#image counter
	n = 0

	k = [1,2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,
			29,30,31,32,33,34,35,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,
			57,58,59,60,61,62]
	kimg = []
	qimg = []
	cbuilds = []

	with open('exp2_buildings.json') as b:
		buildings = json.load(b)

	with open('buildings.json') as ab:
		allbuildings = json.load(ab)	

	with open('dataset.json') as dt:
		dataset = json.load(dt)

	for idx in k:
		for b in buildings['build']:
			if idx == b[0]:
				kimg.append(b[1])		

	cimages = [kimg[i][j] for i in range(len(kimg)) for j in range(1)]
	
	for d in dataset:
		for trainIm in cimages:
			if d['title'] == trainIm:
				qimg.append(d['url'][36:])	


	ts = time.time()
	listExpsTimeStmps = (subprocess.check_output(["ls olmatches/", "-x"], shell=True))
	dateTimeStamp = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d') 	#current date

	if dateTimeStamp in listExpsTimeStmps: 					# if there are previous xperiments for the current date, populate
		
		try:
			curTimestamp = datetime.datetime.fromtimestamp(ts).strftime('%H:%M:%S')

			timestampFolder = "olmatches/" + dateTimeStamp + "/exp_" + curTimestamp
			os.mkdir(timestampFolder , 0777)
		except (RuntimeError, TypeError, NameError):
			print "cannot create expreriment folder"

	else:																		# create current date timestamp if not exist
		curTimestamp = datetime.datetime.fromtimestamp(ts).strftime('%H:%M:%S')

		os.mkdir("olmatches/" + dateTimeStamp , 0777)
		timestampFolder = "olmatches/" + dateTimeStamp + "/exp_" + curTimestamp
		os.mkdir(timestampFolder , 0777)		

	print timestampFolder
	
	executeTime = time.time()

	## #----------------- # ##
	## Read Query Image ##
	
	queryPath = "uploads/" + sys.argv[1]
	img1 = cv2.imread(queryPath, 1)
	img1Res = cv2.resize(img1, (240, 320))
	gray1 = cv2.cvtColor(img1Res, cv2.COLOR_RGB2GRAY)
	
	## sift features and descriptor

	sift = cv2.xfeatures2d.SIFT_create(int(nFeatures),int(nOctaveLayers),float(contrastThres),int(edgeThres),1.6)
	kp1, d1 = sift.detectAndCompute(gray1, None)
	
	## # open, write, close logging files from query Image # ##
	#writeLogsQuery(d1)
	
	#cv2.drawKeypoints(gray1, kp1, img1Res)
	#cv2.imwrite(timestampFolder + '/sift_keypoints1.jpg',img1Res)
	## #----------------- # ##
	
	### -----  ###
	#creating a list of (<image>,#inliers) pairs
	resList = np.zeros( 60 , [('idx', 'int16'), ('imageId', 'a28'), ('inliers', 'int16'), ('percent', 'float'), ('building', 'int8') ])
	

		## -Read and Resize Image- ##
	#for trainIm in qimg:

	for i in trange(60):
		trainIm = qimg[i]
		#print trainIm
		#sleep(0.01)
		
		#save_path = "%s/sift_logs/%s/" % (timestampFolder, str(trainIm[:11]) )
		#print save_path
		#os.mkdir(save_path, 0777)
		#opening
		#print n
		#outof
		#print len(qimg)

		Im2 = "dataset/" + trainIm
		print Im2
		img2 = cv2.imread(Im2,1)
		img2Res = cv2.resize(img2,(240, 320))
		gray2 = cv2.cvtColor(img2Res,cv2.COLOR_RGB2GRAY )	

		## -Compute sift Descriptors- ##
		kp2, d2 = sift.detectAndCompute(gray2,None)


		## # open, write, close logging files from trainImage # ##
		#writeLogsTrain(save_path,d2,kp2)

		#cv2.drawKeypoints(gray2,kp2,img2Res)
		#cv2.imwrite(save_path + '/sift_keypoints2.jpg',img2Res)

		## # ----------------# ##
		## # Matching & Homography # ##

		if(rawMatches):


			bf = cv2.BFMatcher(cv2.NORM_L1,crossCheck=True)
			raw_matches = bf.match(d1,d2)
			p1, p2, kp_pairs = filter_rawMatches(kp1,kp2,raw_matches)
			#kp_pairs = sorted(raw_matches, key = lambda x:x.distance)
			
		else:

			bf = cv2.BFMatcher()
			knn_matches = bf.knnMatch(d1, trainDescriptors=d2, k=3)
			p1, p2, kp_pairs = filter_knnMatches(kp1,kp2,knn_matches)
		

		#print len(d1)
		#print len(d2)
		#print '#Keypoints in image1: %d, image2: %d \n' % (len(kp1), len(kp2))

		
		#print len(p1)
		#print len(p2)
		
		## # ----------------# ##
		## # Homography # ##

		if len(kp_pairs) > 4:
			
			
			Homography, status = cv2.findHomography(p1, p2, cv2.RANSAC, 5.0)
			inliers = np.count_nonzero(status)
			percent = float(inliers) / len(kp_pairs)
		
			#print "# Inliers %d out of %d tentative pairs" % (inliers,len(kp_pairs))
			print '%d' % inliers
			print '{percent:.2%}'.format(percent= percent )
			
			## # open,save,close Homography results
			#hsLog(save_path,Homography, status)			
			
			try:
				h1, w1, z1 = img1Res.shape[:3]
				h2, w2, z2 = img2Res.shape[:3]
				img3 = np.zeros((max(h1, h2), w1+w2,z1), np.uint8)
				img3[:h1, :w1, :z1] = img1Res
				img3[:h2, w1:w1+w2, :z2] = img2Res
				#img3 = cv2.cvtColor(img3, cv2.COLOR_GRAY2BGR)

				p1 = np.int32([kpp[0].pt for kpp in kp_pairs])
				p2 = np.int32([kpp[1].pt for kpp in kp_pairs]) + (w1, 0)

				# plot the matches
				color = (0,250,0)

				for (x1, y1), (x2, y2), inlier in zip(p1, p2, status):
					if inlier:
						cv2.circle(img3, (x1, y1), 2, color, 5)
						cv2.circle(img3, (x2, y2), 2, color, 5)
						cv2.line(img3, (x1, y1), (x2, y2), (255,0,100),2)
					else:
						col = (0, 0, 255)
						r = 2
						thickness = 3
						cv2.line(img3, (x1-r, y1-r), (x1+r, y1+r), col, thickness)
						cv2.line(img3, (x1-r, y1+r), (x1+r, y1-r), col, thickness)
						cv2.line(img3, (x2-r, y2-r), (x2+r, y2+r), col, thickness)
						cv2.line(img3, (x2-r, y2+r), (x2+r, y2-r), col, thickness)
				
				rankingList(n,trainIm,inliers,percent,k[n]) # (imageName,inliers,serial_index)
				
				## Write Matching Image ##
				cv2.imwrite(timestampFolder + '/' + trainIm +  '_sift_match.jpg', img3)
				n+=1

			except (RuntimeError, TypeError, NameError):
				pass				
				rankingList(n,Im2,0,0,0) # (imageName,inliers,serial_index)
				n+=1
				print "Not enough Inliers"

		else:
			pass				
			rankingList(n,Im2,0,0,0) # (imageName,inliers,serial_index)
			n+=1
			print "Not enough tentative correspondenses"
		
	
	#print np.float16(time.time() - executeTime)
	
	## # ----------------# ##
	## # Ranking best results # ##
	
	#print '#%d: %s -> Inliers: %d' % (1, resList[0][1], resList[0][2])
	#print '{percent:.2%}'.format(percent= resList[0][3] )	
	
	## # Results and Experimental Values Logging # ##
	rList = np.sort(resList, order= 'inliers')[::-1]
	jList = rList.reshape((60,1))
	with open(timestampFolder + '/results.json','w') as resultFile:
		dump( {'Results': jList },resultFile )
	
	mdata = {	'Query': queryImg, 'Descriptor' : 'sift' , 'nFeatures': nFeatures , 
				'nOctaveLayers' : nOctaveLayers , 'contrastThres' : contrastThres,
				'edgeThres' : edgeThres, 'rawMatches' : rawMatches ,
				'time' : float(executeTime)
			}
	
	with open(timestampFolder + '/mdata.json','w') as mdataFile:
		dump( {'Metadata': mdata },mdataFile )
	