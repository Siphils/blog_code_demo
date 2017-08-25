### [darren's blog](https://darren.work)原创音乐播放器使用方法

---

- 播放器演示：

  [http://10176523.cn](http://10176523.cn)

  [http://code.darren.work/dplay/demo.html](http://code.darren.work/dplay/demo.html)

-   播放器文件下载：

    [点此下载](https://github.com/ydq/blog_code_demo/releases/download/dplay3/dplay.zip) 或者进入 [https://github.com/ydq/blog_code_demo/releases](https://github.com/ydq/blog_code_demo/releases) 查找dplay.zip下载

-   播放器文件说明：

    | 文件         | 说明                               |
    | ---------- | -------------------------------- |
    | dplay3.js  | 播放器主js文件                         |
    | dplay3.php | 用于重定向到真实的URL地址，作用是欺骗浏览器音频跨域，显示频谱 |

-   使用方法

    ```html
    	<div id="lrc"></div>
    	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"></script>
    	<script src="dplay3.js"></script>
    	<script type="text/javascript">
    	//参数1：歌词容器选择器
    	//参数2：网易云引用歌单id，可以自己创建一个歌单，然后不停的往歌单增加歌曲即可自动更新列表
    	//参数3[可选]：歌曲重定向地址，用于欺骗Chrome、Safari等浏览器音频跨域显示频谱，不设置不显示频谱
    	playmusic('#lrc','867504997');
    	//playmusic('#lrc','869603409','dplay3.php?url=');//需要将php文件放入同一个域名下面
    	</script>
    ```

    ​

您的博客最好要支持pjax，否则页面跳转可能会有简短的中断播放，为了达到最大的兼容，播放器默认会在不支持pjax的页面跳转后接着上次播放的地方继续播放，会记录播放/暂停的状态。为了不干扰用户，如果您同时打开多个您的页面，后打开的页面会接着播放音乐，之前的页面会自动暂停播放，以便同时只会有一个页面发出声音。

显示频谱比较耗电，所以播放器会判断您的显示设备，如果是笔记本，并且使用的是电池（没有接通外接电源），则会自动关闭频谱以省电，当您接入电源后会立刻显示频谱。（前提是您使用php或者其他语言做重定向欺骗浏览器）

更多问题欢迎在我的博客留言咨询。
