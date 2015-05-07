CREATE VIEW vHighQ_Scores 
(PLAYER
 SCORE,
 DATE
)
AS
  SELECT `x_player_name`,`x_score`,`x_timestamp`
from tblScore where x_gameid = 1 order by x_score;


