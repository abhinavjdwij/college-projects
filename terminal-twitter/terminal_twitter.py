#~~~~~~~~~~Abhinav Jha == dwij28~~~~~~~~~~#
# Terminal Twitter
# Script to tweet directly from the terminal. 

''' Dependencies : Selenium / Python 2.7.x '''

from selenium import webdriver
from getpass import getpass
from time import sleep

username = raw_input('Enter Username: ')
password = getpass('Enter Password: ')
tweet = raw_input('Enter Tweet: ').strip()[:144]

br = webdriver.Firefox()
br.maximize_window()
br.get('https://twitter.com/')

view_login = br.find_elements_by_xpath('//*[@id="doc"]/div[1]/div/div[1]/div[2]/button')[0]
view_login.click()

username_box = br.find_elements_by_xpath('//*[@id="login-dialog-dialog"]/div[2]/div[2]/div[2]/form/div[1]/input')[0]
username_box.send_keys(str(username))
password_box = br.find_elements_by_xpath('//*[@id="login-dialog-dialog"]/div[2]/div[2]/div[2]/form/div[2]/input')[0]
password_box.send_keys(str(password))
disable_logged_in = br.find_elements_by_xpath('//*[@id="login-dialog-dialog"]/div[2]/div[2]/div[2]/form/div[3]/label/input')[0]
disable_logged_in.click()
login = br.find_elements_by_xpath('//*[@id="login-dialog-dialog"]/div[2]/div[2]/div[2]/form/input[1]')[0]
login.click()

if 'Login' in br.title:
	sleep(5)
	br.quit()
	print '\nInvalid username / password !! Try Again !!\n'
	exit(1)

expand = br.find_elements_by_xpath('//*[@id="tweet-box-home-timeline"]')[0]
expand.click()
tweet_box = br.find_element_by_id('tweet-box-home-timeline')
tweet_box.send_keys(tweet)
submit_tweet = br.find_elements_by_xpath('//*[@id="timeline"]/div[2]/div/form/div[2]/div[2]/button')[0]
submit_tweet.click()

sleep(10)
br.quit()

print '\nThank You for using the script!\n'
