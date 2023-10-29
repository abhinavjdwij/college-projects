#~~~~~~~~~~~~~~~~~~~~dwij28 == Abhinav Jha~~~~~~~~~~~~~~~~~~~~#

'''
Vocab-Buddy:
	A script that prompts words & their meanings every hour (or as required) to help build vocabulary
	User can remove / add new words and meanings of their choice in the words.txt file
	New words must be formatted as "word : meaning" (same as existing words) on individual lines
Dependencies: Platform Independent / No external packages used
Usage:
	Unix Based OS: Set up a cron job to execute the script everyday (or as required)
	Windows Based OS: Add script to startup folder & ensure python 2.x is installed and added to path variable
	Manually (Works on all OS): Run script every time after booting
'''

from Tkinter import *
from random import *
from time import *

def getwords():
	words = [i.split('-') for i in open('words.txt')]
	seed()
	return choice(words)

def clean(data):
	return 'Word for the hour:\t' + data[0].strip('\n\r').title() \
		+ '\n\nMeaning:\t' + data[1].strip('\n\r').title()

def publish(data):
	root = Tk()
	root.eval('tk::PlaceWindow %s center' % root.winfo_pathname(root.winfo_id()))
	root.geometry('410x160')
	root.title('Vocabulary Buddy')
	main_label = Label(root, text = clean(data), wraplength = 300, padx = 20, pady = 20, background = '#129e66')
	main_label.config(font = 'Serif', fg = '#821d16')
	main_label.pack()
	root.config(background = '#129e66')
	root.after(180*1000, lambda : root.destroy())  # Self Destroy Window after 3 minutes
	root.mainloop()

def main():
	info = getwords()
	publish(info)

if __name__ == '__main__':
	while True:
		sleep(30)  # Initial 30 second Sleep at startup
		main()
		sleep(60*60)  # Sleep for 1 hour