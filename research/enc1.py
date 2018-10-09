from PIL import Image

import binascii

import optparse

import sys

x = sys.argv[1]
em = sys.argv[2]


def rgb2hex(r, g, b):

	return '#{:02x}{:02x}{:02x}'.format(r, g, b)



def hex2rgb(hexcode):

	return tuple(map(ord, hexcode[1:].decode('hex')))



def str2bin(message):

	binary = bin(int(binascii.hexlify(message), 16))

	return binary[2:]



def bin2str(binary):

	message = binascii.unhexlify('%x' % (int('0b'+binary,2)))

	return message



def encode(hexcode, digit):

	if hexcode[-1] in ('0','1', '2', '3', '4', '5'):

		hexcode = hexcode[:-1] + digit

		return hexcode

	else:

		return None



def decode(hexcode):

	if hexcode[-1] in ('0', '1'):

		return hexcode[-1]

	else:

		return None



def hide(filename, message):


	img = Image.open(filename)

	binary = str2bin(message) + '1111111111111110'

	if img.mode in ('RGBA'):

		img = img.convert('RGBA')

		datas = img.getdata()



		newData = []

		digit = 0

		temp = ''


		for item in datas:

			if (digit < len(binary)):

				newpix = encode(rgb2hex(item[0],item[1],item[2]),binary[digit])

				if newpix == None:

					newData.append(item)

				else:

					r, g, b = hex2rgb(newpix)

					newData.append((r,g,b,255))

					digit += 1

			else:

				newData.append(item)

		img.putdata(newData)
		try:
		   img.save('steg/'+em, "PNG")
		except Exception, ex:
		   print(ex)
		"""print("Completed!")"""



	return "Incorrect Image Mode, Couldn't Hide"





def retr(filename):

	img = Image.open(filename)

	binary = ''



	if img.mode in ('RGBA'):

		img = img.convert('RGBA')

		datas = img.getdata()



		for item in datas:

			digit = decode(rgb2hex(item[0],item[1],item[2]))

			if digit == None:

				pass

			else:

				binary = binary + digit

				if (binary[-16:] == '1111111111111110'):

					print "Success"

					return bin2str(binary[:-16])



		return bin2str(binary)

	return "Incorrect Image Mode, Couldn't Retrieve"



def Main():

	hide('google.png', x)


if __name__ == '__main__':

	Main()

	""" MediaFire. (2018). MediaFire. [online] Available at: https://www.mediafire.com/folder/muzrl9brx0z7f/Odds%26Ends#b5bw8hltkegx5 [Accessed 13 Aug. 2018]."""
	""" MediaFire. (2018). code.txt. [online] Available at: http://www.mediafire.com/file/hyjimlh8pel7q9x/code.txt/file [Accessed 13 Aug. 2018]."""
