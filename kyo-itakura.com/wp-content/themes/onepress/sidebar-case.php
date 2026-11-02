<div class="p-sub-menu p-case-sub col-sm-3 col-sm-pull-9">
    <section>
        <h2 class="p-heading_deco">念珠（数珠）について</h2>
        <ul class="c-list">
            <li><a href="/about/about-nenjyu/"><span class="dot" style="background-color: #B99DCA"></span>念珠（数珠）とは？</a></li>
        </ul>
    </section>

    <section class="c-mt-2">
        <h2 class="p-heading_deco">カテゴリー</h2>
        <ul class="c-list">
            <li><a href="/case/"><span class="dot" style="background-color: #B99DCA"></span>すべて</a></li>
            <?php
            // 親カテゴリー「カテゴリー」に属するタームを取得
            $category_terms = get_terms(array(
                'taxonomy'   => 'material',
                'parent'     => get_term_by('slug', 'category', 'material')->term_id,
                'hide_empty' => false,
            ));

            foreach ($category_terms as $term) :
                $term_query = new WP_Query(array(
                    'post_type' => 'case',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'material',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                    'post_status' => 'publish', // 公開投稿のみ
                    'fields'      => 'ids',
                ));
                $count = $term_query->found_posts;
            ?>
                <li>
                    <a href="<?php echo get_term_link($term); ?>">
					<!--<a href="<?php echo esc_url(home_url('/case/material/' . $term->slug)); ?>">-->
                        <span class="dot" style="background-color: #B99DCA"></span>
                        <?php echo $term->name . ' (' . $count . ')'; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="c-mt-2">
        <h2 class="p-heading_deco">カラーから探す</h2>
        <ul class="c-list">
            <?php
            // 親カテゴリー「カラーから探す」に属するタームを取得
            $color_terms = get_terms(array(
                'taxonomy'   => 'material',
                'parent'     => get_term_by('slug', 'color-search', 'material')->term_id,
                'hide_empty' => false,
            ));

            foreach ($color_terms as $term) :
                $term_query = new WP_Query(array(
                    'post_type' => 'case',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'material',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                    'post_status' => 'publish', // 公開投稿のみ
                    'fields'      => 'ids',
                ));
                $count = $term_query->found_posts;
            ?>
                <li>
                    <a href="<?php echo get_term_link($term); ?>">
					<!--<a href="<?php echo esc_url(home_url('/case/material/' . $term->slug)); ?>">-->
                        <span class="dot" style="background-color: <?php echo esc_attr(get_term_meta($term->term_id, 'color', true)); ?>;"></span>
                        <?php echo $term->name . ' (' . $count . ')'; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="c-mt-2">
        <h2 class="p-heading_deco">素材から探す</h2>
        <ul class="c-list">
            <?php
            // 親カテゴリー「素材から探す」に属するタームを取得
            $material_terms = get_terms(array(
                'taxonomy'   => 'material',
                'parent'     => get_term_by('slug', 'material-search', 'material')->term_id,
                'hide_empty' => false,
            ));

            // 日本語のあいうえお順に並べ替え
            usort($material_terms, function($a, $b) {
                return strcmp($a->name, $b->name);
            });

            foreach ($material_terms as $term) :
                $term_query = new WP_Query(array(
                    'post_type' => 'case',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'material',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                    'post_status' => 'publish', // 公開投稿のみ
                    'fields'      => 'ids',
                ));
                $count = $term_query->found_posts;
            ?>
                <li>
                    <a href="<?php echo get_term_link($term); ?>">
					<!--<a href="<?php echo esc_url(home_url('/case/material/' . $term->slug)); ?>">-->
                        <span class="dot" style="background-color: <?php echo esc_attr(get_term_meta($term->term_id, 'color', true)); ?>;"></span>
                        <?php echo $term->name . ' (' . $count . ')'; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.c-list li a').forEach(function(link) {
        // 全角・半角の()の内容を対象にし、数字を含む場合は括弧ごと置き換え
        const regex = /（[^）]*）|\([^)]*\)|\s*\(\d+\)/g;
        link.innerHTML = link.innerHTML.replace(regex, function(match) {
            return '<span style="font-size: 80%;">' + match.trim() + '</span>';
        });
    });
});
</script>
