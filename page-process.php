<?php get_header(); ?>

<main class="process_page_layout">
    <div class="process_container">
         <!-- PC版で表示する大見出しセクション（ジャンピングドット＆マスクカラー反転仕様） -->
        <section class="process_hero_section fade_up_trigger">
            <div class="process_title_typography_wrapper">
                
                <svg class="process_title_svg_container" viewBox="0 0 1000 240" xmlns="http://w3.org">
                    <defs>
                        <!-- 上部をバウンドするマスク用の円（文字色を反転させる範囲） -->
                        <mask id="process_think_mask">
                            <circle cx="0" cy="0" r="130" fill="white" class="process_mask_circle_top" />
                        </mask>
                        <!-- 下部をバウンドするマスク用の円（文字色を反転させる範囲） -->
                        <mask id="process_create_mask">
                            <circle cx="0" cy="0" r="130" fill="white" class="process_mask_circle_bottom" />
                        </mask>
                    </defs>

                    <!-- 【1層目】ベースの通常文字 -->
                    <text x="50" y="135" font-size="64" font-weight="700" fill="#333333" letter-spacing="4">- ご利用までの流れ -</text>

                    <!-- 【2層目】上部ドットが重なった時に切り替わる文字 -->
                    <text x="50" y="135" font-size="64" font-weight="700" fill="#FD8A3A" letter-spacing="4" mask="url(#process_think_mask)">- ご利用までの流れ -</text>

                    <!-- 【3層目】下部ドットが重なった時に切り替わる文字 -->
                    <text x="50" y="135" font-size="64" font-weight="700" fill="#FD8A3A" letter-spacing="4" mask="url(#process_create_mask)">- ご利用までの流れ -</text>

                    <!-- 【4層目】目視できる跳ねる黒丸ドット（上部バウンド） -->
                    <circle class="process_ball_top" r="7" fill="#FD8A3A" />
                    
                    <!-- 【5層目】目視できる跳ねる黒丸ドット（下部バウンド） -->
                    <circle class="process_ball_bottom" r="7" fill="#FD8A3A" />
                </svg>
            </div>

            <!-- シマエナガの透過画像用コンテナ -->
            <div class="process_hero_bird_holder">
                <img src="<?php echo esc_url(get_theme_file_uri('img/simaenaga2001d.png')); ?>" alt="右上シマエナガイラスト" class="process_hero_bird_image">
            </div>

              <!-- ★【SP版専用】新しく作成したシンプルな大見出し -->
            <h2 class="process_sp_only_title">ご利用までの流れ</h2>

        </section>

        <!-- ステップフローセクション -->
        <section class="process_flow_section">
            
            <!-- STEP 1 (右下がりに次のサークルへ斜め線を伸ばす) -->
            <div class="process_step_item line_down_right fade_up_trigger">

                <div class="process_circle_wrapper fade_up_trigger_circle">
                    <div class="process_circle_node">
                        <span class="process_node_text">ご相談<br>お問い合わせ</span>
                        <!-- アイコンイラスト枠 -->
                        <div class="process_node_icon">
                             <img src="<?php echo esc_url(get_theme_file_uri('img/talk.png')); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div> 
                    </div>
                </div>
                <div class="process_content_box fade_up_trigger_text">
                    <h2 class="process_content_title">　ご相談・お問い合わせ<br>
                    （ケアマネジャーへの連絡等）</h2>
                    <p class="process_content_text">
                        WEBのお問い合わせフォームから必要事項を入力。<br>
                        ケアマネジャー、相談支援専門員、または当ステーションへダイレクトにお電話、WEBサイト、公式LINEアカウント等からお気軽にご相談ください。
                    </p>
                </div>
            </div>

            <!-- STEP 2 (左下がりに次のサークルへ斜め線を伸ばす / 左右反転配置) -->
            <div class="process_step_item item_reverse line_down_left">
                <div class="process_circle_wrapper fade_up_trigger_circle">
                    <div class="process_circle_node">
                        <span class="process_node_text">主治医に<br>相談</span>
                        <div class="process_node_icon">
                             <img src="<?php echo esc_url(get_theme_file_uri('img/image22.png')); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box fade_up_trigger_text" id="process_content_box_left">
                    <h2 class="process_content_title">　主治医による<br>「指示書」の発行</h2>
                    <p class="process_content_text">
                        訪問看護を行うにあたり、主治医からの「訪問看護指示書」が必要となります。<br>
                        当ステーションから主治医へ手続きを行うことも可能ですので、お気軽にご相談ください。
                    </p>
                </div>
            </div>

            <!-- STEP 3 (右下がりに次のサークルへ斜め線を伸ばす) -->
            <div class="process_step_item line_down_right">
                <div class="process_circle_wrapper fade_up_trigger_circle">
                    <div class="process_circle_node">
                        <span class="process_node_text">契約</span>
                        <div class="process_node_icon">
                             <img src="<?php echo esc_url(get_theme_file_uri('img/image24.png')); ?>" alt="サークル内アイコン１" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box fade_up_trigger_text">
                    <h2 class="process_content_title">　契約と計画書<br>（ケアプラン）の作成</h2>
                    <p class="process_content_text">
                        ご利用者様のご自宅や施設へ訪問し、システムやサービス内容、料金等をご説明いたします。<br>
                        内容にご納得いただけましたら契約を締結し、ケアプランに沿った訪問看護計画を作成します。
                    </p>
                </div>
            </div>

            <!-- STEP 4 (最後なので次のステップへの線はなし / 左右反転配置) -->
            <div class="process_step_item item_reverse">
                <div class="process_circle_wrapper  fade_up_trigger_circle">
                    <div class="process_circle_node">
                        <span class="process_node_text">利用開始</span>
                        <div class="process_node_icon">
                            <img src="<?php echo esc_url(get_theme_file_uri('img/image25.png')); ?>" alt="サークルアイコンイラスト４" class="process_icon_img">
                        </div>
                    </div>
                </div>
                <div class="process_content_box fade_up_trigger_text" id="process_content_box_left">
                    <h2 class="process_content_title">　サービス利用開始</h2>
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

                <!-- 一番下の鳥のイラストアイコン -->
        <section class="process_visual_section fade_up_trigger">
            <div class="process_hero_image_holder">
                <img src="<?php echo esc_url(get_theme_file_uri('img/simaenaga2001a.png')); ?>" alt="最下部鳥イラスト" class="process_visual_image">
            </div>
        </section>

        <!-- 準備しておくと良いもの（下部インフォメーション） -->
        <section class="process_info_section fade_up_trigger">
            <div class="process_info_card">
                <!-- 見出し -->
                <h4 class="process_info_title">
                     <span class="process_text_marker">☆  準備しておくと良いもの</span>
                </h4>
                <p class="process_info_lead">初回の訪問前に、以下を手元に用意しておくとスムーズです。</p>
                <ul class="process_info_list">
                    <li class="process_info_item">マイナンバーカード、保険証（健康保険証・介護保険被保険者証）</li>
                    <li class="process_info_item">お薬手帳（または現在飲んでいる薬の一覧がわかるもの）</li>
                    <li class="process_info_item">かかりつけ医の診察券・連絡先</li>
                </ul>
                <p class="process_info_note">
                      <!-- 電球アイコン用のコンテナ -->
                    <span class="process_note_hint_icon">
                        <img src="<?php echo get_theme_file_uri('img/right.png'); ?>" alt="電球アイコン" class="process_hint_img">
                    </span>
                    わからないことがあっても、お気軽にご相談ください。<br>スタッフがひとつひとつ丁寧にお答えいたします。
                </p>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>