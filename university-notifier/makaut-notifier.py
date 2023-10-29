#~~~~~~~~~~~~~~~~~~~~dwij28 == Abhinav Jha~~~~~~~~~~~~~~~~~~~~#

'''
MAKAUT Notifier: A script to check if there are any new notices on the makaut website
Dependencies: BeautifulSoup (bs4) & Linux OS
Usage: Set up a cron job to execute the script everyday (or as required)
'''

from urllib import *
from os import path
from bs4 import BeautifulSoup
from subprocess import Popen

if not path.isfile('./old_notices.txt'):
	print 'Creating file for first time use...'
	f = open('old_notices.txt', 'w')
	f.close()

url = 'http://www.makautexam.net/'
old = [i.strip('\n\r') for i in open('old_notices.txt', 'r')]
new = []
soup = BeautifulSoup(urlopen(url), 'html.parser')

for i in soup.findAll('a'):
	link = i.get('href').strip('\n\r')
	if 'Documents' in link and '.pdf' in link and link not in old:
		new.append(link)

for i in new:
	name = i.split('/')[1]
	print 'Downloading ' + name
	urlretrieve(url+i, name)

mod_file = open('old_notices.txt', 'a')
for i in new:
	mod_file.write(i+'\n')
mod_file.close()

if len(new): Popen(['notify-send', str(len(new)) + " New Notice(s) on MAKAUT Website"])
else: print "Nothing to see here.."
