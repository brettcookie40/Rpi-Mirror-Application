#This program will take a JSON string with data in it and separate the
#data into tables in SQL and then publish the data to google cloud SQL
import json
import subprocess
import os
import time
import pymysql
import logging
import rds_config
import sys


HOST = "aat768tktyg42q.ckwlewdgil7r.us-east-2.rds.amazonaws.com"
PORT = "3306"
USER = "smartmirror"
PASS = "hksahfih18$?"
DB_NAME = "smdb"
data = {}
data['key'] = 'value'
json_data = json.dumps(data)

logger =  logging.getLogger()
logger.setLevel(logging.INFO)

try:
	conn = pymysql.connect(HOST,user=USER, passwd=PASS, db=DB_NAME, connect_timeout=5)
except pymysql.MySQLError as e:
	logger.error("ERROR: Unexpected error: Could not connect to MySQL instance.")
	logger.error(e)
	sys.exit()

logger.info("SUCCESS: Connection to RDS MySQL instance  succeeded")

def handler(event, context):
    """
    This function fetches content from MySQL RDS instance
    """

    item_count = 0

    with conn.cursor() as cur:
        cur.execute("insert into settings (name,widget1x,widget1y) VALUES ('Sharma',40,50)")
        conn.commit()
        cur.execute("select * from settings")
        for row in cur:
            item_count += 1
            logger.info(row)
            #print(row)
    conn.commit()

    return "Added %d items from RDS MySQL table" %(item_count)

