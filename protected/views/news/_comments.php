<ul id="pcomments-<?php echo $cid; ?>" class="komens">
    <?php foreach ($comments as $comment): ?>
        <li class="row-fluid" id="c<?php echo $comment->id; ?>">
            <?php
            $this->renderPartial('_comment', array(
                'comment' => $comment,
            ));
            if ($comment->comments !== NULL)
                $this->renderPartial('_comments', array(
                    'comments' => $comment->comments,
                    'cid' => $comment->id,
                ));
            ?>
            <!-- comment -->
        </li>
    <?php endforeach; ?>
</ul>