// スタッフページ専用の処理を記述します。


//HTMLを読み込み完了後に処理を実行する
document.addEventListener('DOMContentLoaded', () => {
    //カード要素の取得
    const cards = document.querySelectorAll('.card');
    //画面幅が699px以下かどうか判定する
    const isSP = () => window.innerWidth <= 699;

    //ループ処理
    cards.forEach((card) => {
        //メイン画像を取得
        const mainImg = card.querySelector('#mainimg img');
        //サムネイル画像を取得
        const thumbnails = card.querySelectorAll('.thumbnails .thumb');
        //サムネイルを包んでいる親コンテナを取得
        const thumbnailsContainer = card.querySelector('.thumbnails');

        //もしサムネイルが１つも存在していなかったらこのカードの処理をスキップ
        if (thumbnails.length === 0) return;
        //現在選択されている画像のインデックス番号
        let currentIndex = 0;
        //オートスライド用のタイマーIDを保持する変数
        let autoSlideInterval = null;

        //指定されたインデックスのサムネイルをアクティブにし、必要に応じてスクロールする関数
        function updateThumbnailsSlider(index) {
            //現在のインデックス番号を更新
            currentIndex = index;
            //現在対象となっているサムネイル要素を取得
            const targetThumb = thumbnails[currentIndex];
            //すべてのサムネイルに対してループ処理
            thumbnails.forEach((thumb, i) => {
                //インデックスが一致するものだけに'active'クラスを付与し、それ以外からは外す
                thumb.classList.toggle('active', i === currentIndex);
            });

            
            //スマホ表示かつ対象のサムネイルが存在する場合のみ実行
            if (isSP() && targetThumb) {
                //サムネイルのコンテナを対象のサムネイル位置までスムーズに横スクロール
                thumbnailsContainer.scrollTo({
                    //コンテナ左端からの対象のサムネイルの位置を計算
                    left: targetThumb.offsetLeft - thumbnailsContainer.offsetLeft,
                    //スムーズスクロールアニメーションを使用
                    behavior: 'smooth'
                });
            }
        }

        //メイン画像を切り替え、サムネイルの状態も更新する関数
        function changeImage(index) {
            //指定されたインデックスのサムネイル要素を取得
            const targetThumb = thumbnails[index];
            //メイン画像とサムネイル画像の両方が存在する場合
            if (mainImg && targetThumb) {
                //メイン画像のURLをサムネイルのURLに差し替える
                mainImg.src = targetThumb.src;
            }

            //サムネイルのアクティブ表示やスクロール位置を更新
            updateThumbnailsSlider(index);
        }

        //スマホ表示時にオートスライドを開始する関数
        function startAutoSlide() {
            //タイマーが未起動かつスマホ表示の場合のみ処理を実行
            if (!autoSlideInterval && isSP()) {
                //3秒ごとに繰り返すタイマーをセット
                autoSlideInterval = setInterval(() => {
                    //次の画像のインデックスを計算（最後の画像の次は0に戻るように余りを算出）
                    const nextIndex = (currentIndex + 1) % thumbnails.length;
                    //次のサムネイル状態へ更新
                    updateThumbnailsSlider(nextIndex);
                }, 3000);
            }
        }
        //オートスライドを停止する関数
        function stopAutoSlide() {
            //タイマーが起動中の場合
            if (autoSlideInterval) {
                //タイマーを解除・停止
                clearInterval(autoSlideInterval);
                //タイマーのIDの変数をリセット
                autoSlideInterval = null;
            }
        }


        //各サムネイルに対してクリックイベントを設定
        thumbnails.forEach((thumb, index) => {
            //サムネイルがクリックされたときの処理
            thumb.addEventListener('click', () => {
                //クリックされたサムネイルの画像に切り替え
                changeImage(index);
                //スマホ表示の場合
                if (isSP()) {
                    //自動スライドのタイマーを一旦リセット
                    stopAutoSlide();
                    startAutoSlide();
                }
            });
        });

        //初期表示として最初のサムネイル（０番目）をアクティブ状態にする
        updateThumbnailsSlider(0);
        //スマホ表示であればオートスライドを開始
        startAutoSlide();

        //画面サイズが変更されたときの処理を設定
        window.addEventListener('resize', () => {
            if (isSP()) {
                //オートスライドを開始
                startAutoSlide();
            } else {
                //オートスライドを停止
                stopAutoSlide();
            }
        });
    });
    

    
});


//スクロール検知のオプションを設定
const observerOptions = {
    //考査の基準となる要素（nullの場合はブラウザの画面全体）
    root: null,
    //判定領域のマージン（画面下部から-50pxの位置で反応させる）
    rootMargin: '0px 0px -50px 0px',
    //対象の要素が10％画面に入ったら交差したと判定
    threshold: 0.1
};

//要素が画面内に入ったかどうかを監視するインスタンスを作成
const observer = new IntersectionObserver((entries, observer) => {
    //entriesを1つずつentryとして取り出して繰り返し処理する
    entries.forEach(entry => {
        //要素が指定の条件で画面内に入っている場合
        if (entry.isIntersecting) {
            //is-showクラスを追加
            entry.target.classList.add('is-show');
        } else {
            //is-showクラスを削除
            entry.target.classList.remove('is-show');
        }
    });
}, observerOptions);


//監視対象とするすべての'.card'要素を取得
const targetImages = document.querySelectorAll('.card');
//各カード要素をIntersectionObserverの監視対象として登録
targetImages.forEach(card => observer.observe(card));