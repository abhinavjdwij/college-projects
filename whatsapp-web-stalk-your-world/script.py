#~~~~~~~~~~~~~~~~~~~~dwij28 == Abhinav Jha~~~~~~~~~~~~~~~~~~~~#

from selenium import webdriver
from time import sleep
from PIL import Image
from random import choice


# <Read List of Friends and Messages>

def read_data(filename):
	try:
		myfile = open(filename, 'r').read().split('\r')[0].split('\n')
		myfile = [i.strip() for i in myfile]
		myfile = filter(lambda x: x != '', myfile)
		return myfile
	except IOError:
		print filename, ': File does not exist. Please create a file', filename, 'with relevant data to continue.'

friends = read_data('friends.txt')
messages = read_data('messages.txt')

# </Read List of Friends and Messages>

br = webdriver.Firefox()
br.maximize_window()
br.get('https://web.whatsapp.com/')

sleep(20) # after login allow website to load

# <Save Display Pictures>

for friend in friends:
	target_xpath = '//span[contains(text(), "' + friend.strip() + '")]'
	target = br.find_element_by_xpath(target_xpath)
	target.click()

	# find friend in chat list
	element = br.find_element_by_class_name('pane-chat-header')
	pos, size = element.location, element.size
	file_name = friend + '.png'

	# screenshot after letting image load
	sleep(10)
	br.save_screenshot(file_name)
	
	# image cropping and final save
	pic = Image.open(file_name)
	left, top = pos['x'], pos['y']
	right, bottom = pos['x'] + size['width'], pos['y'] + size['height']
	pic = pic.crop((left, top, right, bottom))
	pic = pic.crop((0, 0, 60, 60))
	pic.save(file_name)

# </Save Display Pictures>



# <Check For New Display Pictures>

while (True):

	for friend in friends:
		target_xpath = '//span[contains(text(), "' + friend.strip() + '")]'
		target = br.find_element_by_xpath(target_xpath)
		target.click()

		# find friend in active chat list:
		element = br.find_element_by_class_name('pane-chat-header')
		pos, size = element.location, element.size

		# screenshot after letting image load
		sleep(10)
		br.save_screenshot('temp.png')
		
		# image cropping and temp save
		pic = Image.open('temp.png')
		left, top = pos['x'], pos['y']
		right, bottom = pos['x'] + size['width'], pos['y'] + size['height']
		pic = pic.crop((left, top, right, bottom))
		pic = pic.crop((0, 0, 60, 60))
		pic.save('temp.png')

		# check if dp has been changed
		oldpic = Image.open(friend + '.png', 'r')
		newpic = Image.open('temp.png', 'r')

		if oldpic.getdata != newpic.getdata:
			msg_input = br.find_element_by_class_name('pluggable-input-body')
			msg_input.send_keys(choice(messages))
			msg_input.send_keys(u'\ue007') # Enter
			newpic.save(friend + '.png')
			print friend, 'changed display picture.'

		sleep(10)

	sleep(60)

# </Check For New Display Pictures>

br.quit()
