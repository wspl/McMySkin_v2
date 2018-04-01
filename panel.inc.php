<?php
$skindest = 'Minecraft/MinecraftSkins';
$capedest = 'Minecraft/MinecraftCapes';

$eastereggs = Array(
	                       "szszss:#    ...MC的名称加密真操蛋,劳资想玩个反射都射不痛快!",
	                       "Ethernion:#表示我7cm...     （怒，我说的是头发！）",
	                       "szszss: 魂淡！上过床就装陌生人！你说过你会负责的！#Eth:??",
	                       "jingyuan:#    我在卖节操，大家抓紧买啊",
	                       "plqws:#    去他妈的，随便找张狗的照片贴到我的位置吧！",
	                       "ICE：#    ICE棒棒一份！",
	                       "wang123:#    完了完了，都在卖节操了",
	                       "wang123:#    我对这个卖节操的世界绝望了啦！",
	                       "Mustern:jing想知道我喜欢谁不？#ruo:暗暗！",
	                       "PD：撸管有害身体！jing你马上就要中考了不要撸管这么多！#jingyuan:｛捂脸｝三小时前还撸了一管，完了",
	                       "ruo:#  暗暗#  快来#  一起#  做",
	                       "PureDark:#  人家才没有傲娇呢！傲娇什么的做讨厌了！",
	                       "hunluan_2:[黑脸]我银行卡里的钱能买两遍洛天依",
	                       "Indeed:据说这两天全国的屌丝们都在下载一个980MB的文件#   见面：下完了没？#   回答：还早呢！卡在83%不动了！",
	                       "szszss:#    进门暗号：庐山升龙霸#    对方回答：强奸雅典娜",
	                       "Indeed:#  暗暗，就是你了#  赶紧把种子发过来",
	                       "PureDark:#  ICE真名是猪坚强！绝对没有错！",
	                       "PureDark服务器吉祥物——猪坚强诚挚献上！",
	                       "szszss:#  人老了不如年轻时那么屌了  #  现在撸完管子会有迟钝debuff和视线模糊debuff",
	                       "PureDark:#  宣告#  汝之身托吾麾下；吾之命运附汝剑上。#  响应圣杯之召唤，遵从这意志、道理者，回应我！#  吾乃成就世间一切善行者，吾乃集世间万恶之总成者。#  缠绕三大言灵之七天\n  穿越抑制之轮出现吧！天平的守护者！#  @szszss#szszss:#  坚决不出现",
	                       "szszss:#    我去年平安夜被妹子NTR后一夜写出一周都没头绪的文字模块!",
	                       "szszss:#    嗷嗷嗷嗷嗷嗷嗷Let's have a good fuck off!",
	                       'Ethernion:#    反正校领导脑子里只有"这是H","这不是H"的区别',
	                       "Ethernion:#    程序员の审美永远是——哔——信号已中断 ",
	                       "ICE:#  打个比方，暗暗是一个对象#  要让暗暗闭嘴，只需调用暗暗的闭嘴方法",
	                       "无名指比食指长：正宗异性恋#无名指和食指一样长：同性恋#plqws(低头)#plqws:草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草草",
	                       "wang123：#    mindcat：我信春哥#    原地复活了#    春哥：小子你让我穿越古代来救你，这可是消耗很大的菊花之力的#    春哥：你要怎么补偿我#    mindcat死亡#plqws:#    春哥没收了mindcat的菊花#mindcat:#    我臀部没了#mindcat#    哎哟,我臀部没了",
	                       "johnbanq:#    脑子里想到1菊花",
	                       "plqws:#    ICE不要#    不要#    不要",
	                       );
$i=rand(0,count($eastereggs)-1);

if($_SESSION["genuine"]==1){
$numlimited = numlimit($_SESSION["groupid"])+6;
}else{
$numlimited = numlimit($_SESSION["groupid"]);
}

function numlimit($group)
{   
	switch($group)
	{
		case 1:
			return 6;
			break;
		case 2:
			return 7;
			break;
		case 3:
			return 8;
			break;
		case 4:
			return 9;
			break;
		case 5:
			return 10;
			break;
		case 6:
			return 11;
			break;
		case 7:
			return 12;
			break;
		case 8:
			return 13;
			break;
		case 9:
			return 14;
			break;
		case 10:
			return 15;
			break;
		case 11:
			return 16;
			break;
		case 12:
			return 17;
			break;
		case 13:
			return 18;
			break;
		case 14:
			return 19;
			break;
		case 15:
			return 20;
			break;
		case 16:
			return 21;
			break;
		case 17:
			return 22;
			break;
		case 18:
			return 23;
			break;
		case 20:
			return 50;
			break;
		default:
		    return 6;
			break;
	}
}
?>