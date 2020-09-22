<?php
// カウント数取得関数
function get_count($file) {
	$filename = 'data/'.$file.'.dat';
	$fp = @fopen($filename, 'r');
	if ($fp) {
		$vote = fgets($fp, 9182);
	} else {
		$vote = 0;
	}
	return $vote;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--font Awesome icon 読み込み-->
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <!--<title>pikten</title>-->
    <!--css読み込み-->
	  <link rel="stylesheet" href="https://pikten11.github.io/blog/css/blog.css">
	  <link rel="stylesheet" href="https://pikten11.github.io/blog/css/container.css">
	  <link rel="stylesheet" href="https://pikten11.github.io/blog/css/header.css">
	  <link rel="stylesheet" href="https://pikten11.github.io/blog/css/footer.css">
	  <link rel="stylesheet" href="https://pikten11.github.io/blog/css/menu.css">
    <!--タイトル-->
	  <title>講座ーアドオンーLevel0</title>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	  <script>
		  $(function() {
			  allowAjax = true;
			  $('.btn_vote').click(function() {
				  if (allowAjax) {
					  allowAjax = false;
					  $(this).toggleClass('on');
					  var id = $(this).attr('id');
					  $(this).hasClass('on') ? Vote(id, 'plus') : Vote(id, 'minus');
				  }
			  });
		  });
		  function Vote(id, plus) {
			  cls = $('.' + id);
			  cls_num = Number(cls.html());
			  count = plus == 'minus' ? cls_num - 1 : cls_num + 1;
			  $.post('vote.php', {'file': id, 'count': count}, function(data) {
				  if (data == 'success') cls.html(count);
				  setTimeout(function() {
					  allowAjax = true;
				  }, 1000);
			  });
		  }
	  </script>
	</head>
	<body>
		<script type="text/javascript" src="https://pikten11.github.io/blog/js/header.js"></script>
		<script type="text/javascript">header();</script>
		<div class="container">
			<div class="course">
				<h1>開発環境を整えよう！</h1>
				<hr>
				<h2 class="course-title" id="start">始めに...</h2>
				<p>皆さん、こんにちは。piktenと申します。<br>
					これが、初投稿ですかね。うまくかけてるといいな～。<br>
					ということで、今回はアドオンを作るのではなく作るための環境「開発環境」を紹介しようとおもいます。
				</p>
				<h2 class="course-title" id="contents1">開発環境</h2>
				<p>開発環境といってもそこまで難しくないです。<br>
					アドオンを作るのには、テキストエディタとファイルマネージャーさえあれば大丈夫です。<br>
					アドオンはpcはもちろん、スマホでも作れるのでお手頃で今回はその中でよくみかけるものを紹介します。
				</p>
				<h3 class="course-subtitle">Windowsの場合</h3>
				<p>私は、win10は持っていないのであまり分かりませんが、アドオン作るのに良いらしいです。<br>
					そんなwin10でよく見かけるエディタが<a href="https://code.visualstudio.com/">Visual Studio Code</a>です。<br>
					Visual Studio Codeは、デフォルトで便利な機能が備わっていて、かつ軽量らしいです。<br>
					また、<a href="https://atom.io/">Atom</a>というのもよく見かけます。<br>
					その他にも、<a href="https://tera-net.com/library/tpad.html">TeraPad</a>や<a href="https://coteditor.com">CotEditor</a>など沢山あるので<br>
					自分にあったエディタを選んでください！
				</p>
				<h3 class="course-subtitle">Androidの場合</h3>
				<p>私もAndroidで作っています。<br>
					Androidで入れといた方が良いというのが<a href="https://play.google.com/store/apps/details?id=com.alphainventor.filemanager&hl=ja">ファイルマネージャー</a>です。<br>
					これは、とても使いやすいのでおすすめです!<br>
					また、エディタでおすすめなのは<a href="https://play.google.com/store/apps/details?id=com.rhmsoft.edit&hl=ja">QuickEdit</a>です。
					<br>言語が豊富なので便利です。
				</p>
				<h3 class="course-subtitle">IOSの場合</h3>
				<p>
					iosは使ったことがないのですが、ファイルマネージャーだと<br>
					<a href="https://apps.apple.com/jp/app/documents-by-readdle/id364901807">Documents by Readdle</a>を使っている人をよく見かけます。<br>
					エディタはあまり分からないので、調べてみてください！
				</p>
				<h3 class="course-subtitle">最後に...</h3>
				<p>
					Win10,Android,IOSと紹介していきましたが、一番重要なのは<strong>自分にあったものを使うこと</strong>です。<br>
					今回、紹介したものはあくまでも参考程度に選んでみてください！<br>
					しかし、AndroidやIOSでファイルマネージャーを入れるさいは、圧縮や解凍、名前の変更、移動などができるものにしてください！<br>
					次回は、「アドオンとはなんなのか」についてはなしていきます！<br>
					最後に、質問や誤字・脱字などがみつかった場合は、TwitterのDMにお願いします。<br>
					それではまた～
				</p>
				<p class="ico_heart vote_01"><?= get_count('vote_01') ?></p>
				<p class="btn_vote" id="vote_01"></p>
			</div>
		</div>
		<script type="text/javascript" src="https://pikten11.github.io/blog/js/footer.js"></script>
		<script type="text/javascript">footer();</script>
  </body>
</html>
