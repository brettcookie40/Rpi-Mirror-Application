# A lambda function to interact with AWS RDS MySQL

import pymysql
import sys

REGION = 'us-east-2a'

rds_host  = "smdb2.ckwlewdgil7r.us-east-2.rds.amazonaws.com"
name = "smartmirror"
password = "hksahfih18$?"
db_name = "smdb2"

def save_events(event):
	"""
	This function fetches content from mysql RDS instance
	"""
	result = []
	conn = pymysql.connect(rds_host, user=name, passwd=password, db=db_name, connect_timeout=5)
	with conn.cursor() as cur:
		cur.execute("create table settings (name VARCHAR(20), widget1x INTEGER,widget1y INTEGER)")
		cur.execute("insert into settings (name,widget1x,widget1y) VALUES ('Sharma',40,50)")
		cur.execute("select * from settings")
		conn.commit()
		cur.close()
		for row in cur:
			result.append(list(row))
		print "Data from RDS..."
		print result

def main(event, context):
	save_events(event)


# event = {
#   "id": 777,
#   "name": "appychip"
# }
# context = ""
# main(event, context)


