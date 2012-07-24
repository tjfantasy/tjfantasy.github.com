
<!DOCTYPE html>
<!--[if IEMobile 7 ]><html class="no-js iem7"><![endif]-->
<!--[if lt IE 9]><html class="no-js lte-ie8"><![endif]-->
<!--[if (gt IE 8)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>instagram - Fantasy Blog</title>
  <meta name="author" content="fantasy">

  
  <meta name="description" content="Instagram Jun 19th, 2012 <?php $access_token='183904190.1fb234f.dc19aa0f29d945d5865d71345d2d9016'; $count_images=90; $cache_time=60; $image_size=' &hellip;">
  

  <!-- http://t.co/dKP3o1e -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="canonical" href="http://tjfantasy.github.com/photos/instagram.php">
  <link href="/favicon.png" rel="icon">
  <link href="/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css">
  <script src="/javascripts/modernizr-2.0.js"></script>
  <script src="/javascripts/ender.js"></script>
  <script src="/javascripts/octopress.js" type="text/javascript"></script>
  <link href="/atom.xml" rel="alternate" title="Fantasy Blog" type="application/atom+xml">
  <!--Fonts from Google"s Web font directory at http://google.com/webfonts -->
<link href="http://fonts.googleapis.com/css?family=PT+Serif:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css">

  
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-32892685-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>


</head>

<body   >
  <header role="banner"><hgroup>
  <h1><a href="/">Fantasy Blog</a></h1>
  
    <h2>programmer | blogger | web guy | java fan</h2>
  
</hgroup>

</header>
  <nav role="navigation"><ul class="subscription" data-subscription="rss">
  <li><a href="/atom.xml" rel="subscribe-rss" title="subscribe via RSS">RSS</a></li>
  
</ul>
  
<form action="http://google.com/search" method="get">
  <fieldset role="search">
    <input type="hidden" name="q" value="site:tjfantasy.github.com" />
    <input class="search" type="text" name="q" results="0" placeholder="Search"/>
  </fieldset>
</form>
  
<ul class="main-navigation">
  <li><a href="/">博客</a></li>
  <li><a href="/photos">图片</a></li>
  <li><a href="/download">资料下载</a></li>
  <li><a href="/blog/archives">Archives</a></li>
</ul>

</nav>
  <div id="main">
    <div id="content" class="content">
      <div>
<article role="article">
  
  <header>
    <h1 class="entry-title">Instagram</h1>
    <p class="meta">








  


<time datetime="2012-06-19T15:05:00+08:00" pubdate data-updated="true">Jun 19<span>th</span>, 2012</time></p>
  </header>
  
  <?php

  $access_token='183904190.1fb234f.dc19aa0f29d945d5865d71345d2d9016';
  $count_images=90;
  $cache_time=60;
  $image_size='thumbnail';
  
  /**
  Output each image with HTML markup
 */
  function echoimage($val, $imagesize) {
      $image = $val["images"][$imagesize]["url"];
      $link = $val["link"];
      $tag=md5($link);
      return "<a href=\"$link\" target=\"_blank\"><img src=\"$image\"/></a>";
      }
      
  /**
  Getting the Data from the API
 */
  function getDataFromApi($token, $number){
      // Instagram API bearbeiten
      $url="https://api.instagram.com/v1/users/self/media/recent/?access_token=$token&count=$number";
      $contents = file_get_contents($url);
      return $contents;
  }
  
  /**
  Gets the Data from either the Cache or the API
 */
  function getData($token, $number, $cache_time){

      $cache_folder = "your cache path";
  
      if(!is_dir($cache_folder)){
        if(mkdir($cache_folder, 0777) == false){
          return getDataFromApi($token, $number);
        }
      }
  
      $cachefile = $cache_folder."user.cache";
  
      if (file_exists($cachefile) && time()-filemtime($cachefile)<$cache_time) {
        try{
          $contents = file_get_contents($cachefile);
        }catch(Exception $e){
          $contents = getDataFromApi($token, $number);
          file_put_contents($cachefile, $contents);
        }
  
      } else {
        $contents = getDataFromApi($token, $number);
        file_put_contents($cachefile, $contents);
      }
  
      return $contents;
  }
  
  $json = json_decode(getData($access_token, $count_images, $cache_time), true);

  echo '<div class="photosdiv">';
  foreach ($json["data"] as $value)
      echo echoimage($value, $image_size);
  echo '</div>';
  
?>
  
    <footer>
      <p class="meta">
        
        








  


<time datetime="2012-06-19T15:05:00+08:00" pubdate data-updated="true">Jun 19<span>th</span>, 2012</time>
        
      </p>
      
        <div class="sharing">
  
  <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://tjfantasy.github.com/photos/instagram.php" data-via="" data-counturl="http://tjfantasy.github.com/photos/instagram.php" >Tweet</a>
  
  
  
</div>

      
    </footer>
  
</article>

  <section>
    <h1>Comments</h1>
    <div id="disqus_thread" aria-live="polite"><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
  </section>

</div>

<aside class="sidebar">
  
    <section>
 <h1>文章分类</h1>
 <ul id="categories">
 <li class='category'><a href=' /blog/categories/jquery/'>JQuery (1)</a></li>
<li class='category'><a href=' /blog/categories/ralasafe/'>ralasafe (1)</a></li>
<li class='category'><a href=' /blog/categories/技术沙龙/'>技术沙龙 (3)</a></li>

 </ul>
</section><section>
  <h1>最近的文章</h1>
  <ul id="recent_posts">
    
      <li class="post">
        <a href="/blog/2012/07/24/salon-july/">技术沙龙7月－“盛夏荷风“(未开始)</a>
      </li>
    
      <li class="post">
        <a href="/blog/2012/06/26/jquery-ajaxform-1/">ajaxForm文件上传的BUG</a>
      </li>
    
      <li class="post">
        <a href="/blog/2012/06/25/ralasa-1/">ralasafe重构和改造之路</a>
      </li>
    
      <li class="post">
        <a href="/blog/2012/06/21/salon-june/">技术沙龙6月－“仲夏端阳”(已结束)</a>
      </li>
    
      <li class="post">
        <a href="/blog/2012/06/20/salon-may/">技术沙龙5月－“日志前世今生“(已结束)</a>
      </li>
    
  </ul>
</section>






  
</aside>


    </div>
  </div>
  <footer role="contentinfo"><p>
  Copyright &copy; 2012 - fantasy -
  <span class="credit">Powered by <a href="http://octopress.org">Octopress</a></span>
</p>

</footer>
  

<script type="text/javascript">
      var disqus_shortname = 'tjfantasy';
      
        
        // var disqus_developer = 1;
        var disqus_identifier = 'http://tjfantasy.github.com/photos/instagram.php';
        var disqus_url = 'http://tjfantasy.github.com/photos/instagram.php';
        var disqus_script = 'embed.js';
      
    (function () {
      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = 'http://' + disqus_shortname + '.disqus.com/' + disqus_script;
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    }());
</script>







  <script type="text/javascript">
    (function(){
      var twitterWidgets = document.createElement('script');
      twitterWidgets.type = 'text/javascript';
      twitterWidgets.async = true;
      twitterWidgets.src = 'http://platform.twitter.com/widgets.js';
      document.getElementsByTagName('head')[0].appendChild(twitterWidgets);
    })();
  </script>





</body>
</html>
