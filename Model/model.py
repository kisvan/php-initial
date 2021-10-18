import pandas as pd
import numpy as np
from decipy import executors as exe
df = pd.read_excel('data.xlsx', na_values='(missing)')
alts = ['1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10']
crits = ['C1', 'C2', 'C3']
beneficial = [True,True, True]
weights = [0.25, 0.25, 0.50]
xij = pd.DataFrame(df)

kwargs = {
    'data': xij,
    'beneficial': beneficial,
    'weights': weights,
    'rank_reverse': True,
    'rank_method': "ordinal"
}
wsm = exe.WSM(**kwargs)
wpm = exe.WPM(**kwargs)
topsis = exe.Topsis(**kwargs)
vikor = exe.Vikor(**kwargs)

print("WSM Ranks")
print(wsm.dataframe)

print("WPM Ranks")
print(wpm.dataframe)

print("TOPSIS Ranks")
print(topsis.dataframe)

print("Vikor Ranks")
print(vikor.dataframe)

analizer = exe.RankSimilarityAnalyzer()
analizer.add_executor(wsm)
analizer.add_executor(wpm)
analizer.add_executor(topsis)
analizer.add_executor(vikor)
results = analizer.analyze()
print(results)
print(df)
