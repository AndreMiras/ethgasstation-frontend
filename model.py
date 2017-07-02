#analysis:  Run poission regression models

import mysql.connector
import pandas as pd
import numpy as np 
import statsmodels.api as sm
import math
import sys
import os, subprocess, re
import urllib,json
from sqlalchemy import create_engine 

cnx = mysql.connector.connect(user='ethgas', password='station', host='127.0.0.1', database='tx')
cursor = cnx.cursor()
query = ("SELECT prediction1.*, minedtransactions.minedBlock, minedtransactions.gasused FROM prediction1 LEFT JOIN minedtransactions ON prediction1.txHash = minedtransactions.txHash")

cursor.execute(query)
head = cursor.column_names
predictData = pd.DataFrame(cursor.fetchall())
predictData.columns = head
cursor.close()

print('total transactions:')
print(len(predictData))
print('total confirmed transactions:')
print(predictData['minedBlock'].count())

predictData['confirmTime'] = predictData['minedBlock']-predictData['postedBlock']


print('zero/neg confirm times: ')
print(predictData[predictData['confirmTime']<=0].count())

predictData[predictData['confirmTime'] <= 0] = np.nan
predictData.dropna()
predictData['const'] = 1

print ('cleaned transactions: ')
print (len(predictData))


predictData['gasOffered'] = predictData['gasOffered'].apply(lambda x: x/4710000)

print(predictData)

model = sm.Poisson(predictData['confirmTime'], predictData['const'])
results = model.fit()
print (results.summary())

model = sm.Poisson(predictData['confirmTime'], [predictData['const'], predictData['hashPowerAccepting']])
results = model.fit()
print (results.summary())

model = sm.Poisson(predictData['confirmTime'], [predictData['const'], predictData['hashPowerAccepting'], predictData['gasOffered']])
results = model.fit()
print (results.summary())

model = sm.Poisson(predictData['confirmTime'], [predictData['const'], predictData['hashPowerAccepting'], predictData['gasOffered'], predictData['pctLimitGasAbove']])
results = model.fit()
print (results.summary())

