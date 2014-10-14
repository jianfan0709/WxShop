<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="/WxShop/Public/css/zy.css" rel="stylesheet" type="text/css" />
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui">
<script src="/WxShop/Public/js/jquery.js"></script>
<title>微店</title>
</head>
<body>
<div class="box" style=" padding-bottom:51px;">
	<div class="top">
    	<a class="tjt" href="javascript:history.go(-1);"><img src="/WxShop/Public/images/tjt_03.png"></a>
        <a class="a1">预览商品</a>
        <a class="a5" href="#">刷新</a>
    </div>
    <div class="baik">
        <div class="dian"><img src="/WxShop/Public/images/dian_03.png">微店<span class="dian1">商品详情</span></div>
         <div class="xin"><img src="/WxShop/Public/images/xin_09.png"></div>
        <div class="huitiao2"></div>
      </div>
      <div class="yl_k">
        <div class="yl_1">
        	<img src="/WxShop/Uploads/goodsImg/<?php echo ($goods["headerImg"]); ?>"width="100%"height="143px">
            <p class="yl_p1"><?php echo ($goods["name"]); ?></p>
            <p class="yl_p2">￥<?php echo ($goods["retailPrice"]); ?></p>
        </div>
        <div class="yl_2"><p>总销量<?php echo ($goods["sellQuantity"]); ?></p></div>
        <div class="yl_3">
           <span>数量：</span>
           <div class="yl_sl">
             <div class="yl_p4">

              
              <a class="num_oper num_min" href="javascript:jQuery.reduce('#J_Amount');">-</a>  
              <input name="J_Amount" id="J_Amount" class="input_txt" type="text" maxlength="6" style="width:20px" value="1" onkeyup="jQuery.modify('#J_Amount');"/>  
              <a class="num_oper num_plus" href="javascript:jQuery.add('#J_Amount')">+</a>  
              <p class="caution_tips" id="J_Tip" style="display:none;"></p>  
              <input id="nAmount" type="hidden" value="1000"/>  


              </div> 
             <div class="yl_p5">剩余<?php echo ($goods["remainingQuantity"]); ?>件</div>
           </div>
           <div class="yl_c">
           		<div class="yl_gw"><a href="gwc_yl.html">我的购物车</a></div>
                <div class="yl_jr"><a href="#">加入购物车</a></div>
                <div class="yl_gm"><a href="gwc_gm.html">立即购买</a></div>
           </div>
        </div>
        <div  class="yl_4"><p>邀请卖家开通担保交易，购物更放心！</p></div>
        <div class="yl_5">
        	<a href="yldp.html"><img src="/WxShop/Public/images/yl-2_03.png"></a>
            <p class="yl_p6"><a href="yldp.html">开心就好</a></p>
            <div class="yl_ht"></div>
            <p class="yl_p7"><a href="yldp.html">进入店铺</a></p>
        </div>
        <div class="yl_sp">商品详情</div>
        <div style="margin-left:5%">
          <?php echo ($goods["description"]); ?>
        </div>
        <div class="yl_kd"><a href="wyykwd.html">我也要开微店</a></div>
      </div>

     <div class="db1">
       		<ul>
            	<li><img src="/WxShop/Public/images/fdj.png"></li>
            	<li class="line"><a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">商品分类</a>
        <div id="light" class="white_content">该店家暂未设置分类 <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">关闭</a></div> 
        <div id="fade" class="black_overlay"></div> </li>
      			<li class="line"><a href="wdwd1.html">我的微店</a></li>
      			<li class="line"><a href="gwc.html">购物车</a></li>
  			</ul>
            <div class="tb_content">
            	<div class="search_left">
                	<a  class="tb_title"></a>
                </div>
                <form action="" method="get">
                	<input  class="block"type="search" placeholder="搜索本店铺商品">
                    <a class="search">搜索</a> 
                </form>
            </div>
    </div>
</div>
</body>
<script>
  jQuery.extend( {
  min : 1,
  reg : function(x) {
    jQuery('#J_Tip').html("");
    jQuery('#J_Tip').hide();
    return new RegExp("^[1-9]\\d*$").test(x);
  },
  amount : function(obj, mode) {
    var x = jQuery(obj).val();
    if (this.reg(parseInt(x))) {
      if (mode) {
        x++;
      } else {
        x--;
      }
    } else {
      jQuery('#J_Tip').html("<i class=\"ico\"></i>请输入正确的数量！");
      jQuery('#J_Tip').show();
      jQuery(obj).val(1);
      jQuery(obj).focus();
    }
    return x;
  },
  reduce : function(obj) {
    var x = this.amount(obj, false);
    if (parseInt(x) >= this.min) {
      jQuery(obj).val(x);
    } else {
      jQuery('#J_Tip').html("<i class=\"ico\"></i>商品数量最少为" + this.min
          + "！");
      jQuery('#J_Tip').show();
      jQuery(obj).val(1);
      jQuery(obj).focus();
    }
  },
  add : function(obj) {
    var x = this.amount(obj, true);
    var max = jQuery('#nAmount').val();
    if (parseInt(x) <= parseInt(max)) {
      jQuery(obj).val(x);
    } else {
      jQuery('#J_Tip').html("<i class=\"ico\"></i>您所填写的商品数量超过库存！");
      jQuery('#J_Tip').show();
      jQuery(obj).val(max == 0 ? 1 : max);
      jQuery(obj).focus();
    }
  },
  modify : function(obj) {
    var x = jQuery(obj).val();
    var max = jQuery('#nAmount').val();
    if (!this.reg(parseInt(x))) {
      jQuery(obj).val(1);
      jQuery(obj).focus();
      jQuery('#J_Tip').html("<i class=\"ico\"></i>请输入正确的数量！");
      jQuery('#J_Tip').show();
      return;
    }
    var intx = parseInt(x);
    var intmax = parseInt(max);
    if (intx < this.min) {
      jQuery('#J_Tip').html("<i class=\"ico\"></i>商品数量最少为" + this.min
          + "！");
      jQuery('#J_Tip').show();
      jQuery(obj).val(this.min);
      jQuery(obj).focus();
    } else if (intx > intmax) {
      jQuery('#J_Tip').html("<i class=\"ico\"></i>您所填写的商品数量超过库存！");
      jQuery('#J_Tip').show();
      jQuery(obj).val(max == 0 ? 1 : max);
      jQuery(obj).focus();
    }
  }
});
</script>
</html>