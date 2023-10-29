'''input
test2.jpg
'''

#~ @author = dwij28 (Abhinav Jha) ~#

import warnings
warnings.filterwarnings('ignore') # suppress import warnings

import os
import sys
import cv2
import tflearn
import numpy as np
import tensorflow as tf
from tflearn.layers.conv import conv_2d, max_pool_2d
from tflearn.layers.core import input_data, dropout, fully_connected
from tflearn.layers.estimator import regression

''' <global actions> '''

IMG_SIZE = 50
LR = 1e-3
MODEL_NAME = 'dwij28leafdiseasedetection-{}-{}.model'.format(LR, '2conv-basic')
tf.logging.set_verbosity(tf.logging.ERROR) # suppress keep_dims warnings
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3' # suppress tensorflow gpu logs

''' </global actions> '''

def process_verify_data(filepath):

	verifying_data = []

	img_name = filepath.split('.')[0]
	img = cv2.imread(filepath, cv2.IMREAD_COLOR)
	img = cv2.resize(img, (IMG_SIZE, IMG_SIZE))
	verifying_data = [np.array(img), img_name]
	
	np.save('verify_data.npy', verifying_data)
	
	return verifying_data

def analysis(filepath):

	verify_data = process_verify_data(filepath)

	str_label = "Cannot make a prediction."
	status = "Error"

	tf.reset_default_graph()

	convnet = input_data(shape=[None, IMG_SIZE, IMG_SIZE, 3], name='input')

	'''
	# relu:

	Relu is used in the middle / hidden layers of the network to regularize the activation.
	It is essentialy the function: max(0, x)
	Activation should not be in negative, either it should be zero or more than that.

	# softmax: 

	Softmax is used for the output layer in multi class classification problems.
	It is essentialy the function: log(1 + e^x)
	It outputs a vector of probabilities of each class.

	'''
	
	convnet = conv_2d(convnet, 32, 3, activation='relu')
	convnet = max_pool_2d(convnet, 3)

	convnet = conv_2d(convnet, 64, 3, activation='relu')
	convnet = max_pool_2d(convnet, 3)

	convnet = conv_2d(convnet, 128, 3, activation='relu')
	convnet = max_pool_2d(convnet, 3)

	convnet = conv_2d(convnet, 32, 3, activation='relu')
	convnet = max_pool_2d(convnet, 3)

	convnet = conv_2d(convnet, 64, 3, activation='relu')
	convnet = max_pool_2d(convnet, 3)

	convnet = fully_connected(convnet, 1024, activation='relu')
	convnet = dropout(convnet, 0.8)
	
	convnet = fully_connected(convnet, 4, activation='softmax')
	convnet = regression(convnet, optimizer='adam', learning_rate=LR, loss='categorical_crossentropy', name='targets')

	model = tflearn.DNN(convnet, tensorboard_dir='log')

	if os.path.exists('{}.meta'.format(MODEL_NAME)):
		model.load(MODEL_NAME)
		print 'Model loaded successfully.'
	else:
		print 'Error: Create a model using neural_network.py first.'

	img_data, img_name = verify_data[0], verify_data[1]

	orig = img_data
	data = img_data.reshape(IMG_SIZE, IMG_SIZE, 3)

	model_out = model.predict([data])[0]

	if np.argmax(model_out) == 0: str_label = 'Healthy'
	elif np.argmax(model_out) == 1: str_label = 'Bacterial'
	elif np.argmax(model_out) == 2: str_label = 'Viral'
	elif np.argmax(model_out) == 3: str_label = 'Lateblight'

	if str_label =='Healthy': status = 'Healthy'
	else: status = 'Unhealthy'

	result = 'Status: ' + status + '.'
	
	if (str_label != 'Healthy'): result += '\nDisease: ' + str_label + '.'

	return result

def main():
	filepath = raw_input("Enter Image File Name:\n")
	print analysis(filepath)

if __name__ == '__main__': main()
