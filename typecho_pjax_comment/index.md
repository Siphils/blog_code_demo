### typecho使用Pjax等主题导致评论失效的解决方案

---

-   替换`var/Widget/Archive.php`文件为当前仓库中的`Archive.php`文件 [点此进入下载页面](https://github.com/ydq/blog_code_demo/tree/master/typecho_pjax_comment)

-   修改`usr/themes/default/comments.php`文件，在最底部else上面添加`<?php $this->commentjs();?>`

    最终效果：

    ```php
        <?php $this->commentjs(); ?><!-- 注意这里，添加评论需要的js -->
        <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?>
    </div>
    ```

