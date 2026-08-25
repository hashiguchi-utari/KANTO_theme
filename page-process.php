<?php get_header(); ?>

<main class="process_page_layout">
    <div class="process_container">
        
        <!-- 大見出しセクション（フォントサイズ72px / 左上配置） -->
        <section class="process_hero_section fade_up_trigger">
            <h1 class="process_main_title">ご利用までの流れ</h1>
        </section>

        <!-- ステップフローセクション -->
        <section class="process_flow_section">
            
            <!-- STEP 1 (右下がりに次のサークルへ斜め線を伸ばす) -->
            <div class="process_step_item line_down_right fade_up_trigger">
                <div class="process_circle_wrapper">
                    <div class="process_circle_node">
                        <span class="process_node_text">相談<br>お問い合せ</span>
                        <!-- 160px×160pxの大型アイコンイラスト枠 -->
                        <div class="process_node_icon">
                             <img src="<?php echo get_theme_file_uri('img/image23.png'); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div> 
                    </div>
                </div>
                <div class="process_content_box">
                    <h2 class="process_content_title">ご相談・お問い合わせ<br>
                    （ケアマネジャーへの連絡等）</h2>
                    <p class="process_content_text">
                        WEBのお問い合わせフォームから必要事項を入力。<br>
                        ケアマネジャー、相談支援専門員、または当ステーションへダイレクトにお電話、WEBサイト、公式LINEアカウント等からお気軽にご相談ください。
                    </p>
                </div>
            </div>

            <!-- STEP 2 (左下がりに次のサークルへ斜め線を伸ばす / 左右反転配置) -->
            <div class="process_step_item item_reverse line_down_left fade_up_trigger">
                <div class="process_circle_wrapper">
                    <div class="process_circle_node">
                        <span class="process_node_text">主治医に<br>相談</span>
                        <div class="process_node_icon">
                             <img src="<?php echo get_theme_file_uri('img/image22.png'); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box">
                    <h2 class="process_content_title">主治医による<br>「指示書」の発行</h2>
                    <p class="process_content_text">
                        訪問看護を行うにあたり、主治医からの「訪問看護指示書」が必要となります。<br>
                        当ステーションから主治医へ手続きを行うことも可能ですので、お気軽にご相談ください。
                    </p>
                </div>
            </div>

            <!-- STEP 3 (右下がりに次のサークルへ斜め線を伸ばす) -->
            <div class="process_step_item line_down_right fade_up_trigger">
                <div class="process_circle_wrapper">
                    <div class="process_circle_node">
                        <span class="process_node_text">契約</span>
                        <div class="process_node_icon">
                             <img src="<?php echo get_theme_file_uri('img/image24.png'); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box">
                    <h2 class="process_content_title">契約と計画書<br>（ケアプラン）の作成</h2>
                    <p class="process_content_text">
                        ご利用者様のご自宅や施設へ訪問し、システムやサービス内容、料金等をご説明いたします。<br>
                        内容にご納得いただけましたら契約を締結し、ケアプランに沿った訪問看護計画を作成します。
                    </p>
                </div>
            </div>

            <!-- STEP 4 (最後なので次のステップへの線はなし / 左右反転配置) -->
            <div class="process_step_item item_reverse fade_up_trigger">
                <div class="process_circle_wrapper">
                    <div class="process_circle_node">
                        <span class="process_node_text">開始</span>
                        <div class="process_node_icon">
                            <img src="<?php echo get_theme_file_uri('img/image25.png'); ?>" alt="サークルアイコンイラスト４" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box">
                    <h2 class="process_content_title">サービス利用開始</h2>
                    <p class="process_content_text">
                        訪問看護計画に基づき、定期的な訪問看護サービスがスタートします。<br>
                        地域の医療機関やケアマネジャーと連携しながら、安心できる療養生活を全力でサポートいたします。
                    </p>
                </div>
            </div>
        </section>

        <div class="process_container">
        

        <!-- ステップフローセクション（前述のSTEP 1〜4がここ） -->
        <section class="process_flow_section">
            <!-- （中略：STEP 1 〜 STEP 4） -->
        </section>

        <!-- 準備しておくと良いもの（下部インフォメーション） -->
        <section class="process_info_section fade_up_trigger">
            <div class="process_info_card">
                <!-- 40px相当のh4見出し -->
                <h4 class="process_info_title">準備しておくと良いもの</h4>
                <p class="process_info_lead">お問合せからリハビリ・各種手続きを円滑に進めるため、以下をご準備ください。</p>
                <ul class="process_info_list">
                    <li class="process_info_item">各種保険証（介護保険証・医療保険証など）</li>
                    <li class="process_info_item">現在処方されているお薬の内容がわかるもの（お薬手帳など）</li>
                    <li class="process_info_item">主治医の病院名・診療科・お名前</li>
                </ul>
                <p class="process_info_note">わからないことがあっても、お気軽にご相談ください。<br>スタッフがひとつひとつ丁寧にお答えいたします。</p>
            </div>
        </section>

        <!-- 一番下の鳥のイラストアイコン -->
        <section class="process_visual_section fade_up_trigger">
            <div class="process_hero_image_holder">
                <img src="<?php echo get_theme_file_uri('img/Frame206.png'); ?>" alt="最下部鳥イラスト" class="process_visual_image">
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>