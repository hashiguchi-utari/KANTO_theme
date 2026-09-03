document.addEventListener("DOMContentLoaded", function () {

  const serviceMessage = document.querySelector(".service_message");
  const speakHuman = document.querySelector(".speak_human");
  const photos = document.querySelectorAll(".photo");
  const icons = document.querySelectorAll(".heart, .speak, .grouphome");

  const isSP = window.matchMedia("(max-width: 699.98px)").matches;

  if (isSP) {

  // SP：speak_humanが画面に入ったら開始
  const observer = new IntersectionObserver((entries) => {

    if (!entries[0].isIntersecting) return;

    // ① 人物
    speakHuman.classList.add("is-visible");

    // ② 文字
    setTimeout(() => {
      serviceMessage.classList.add("is-visible");
    }, 500);

    // ③ アイコン
    icons.forEach((icon, index) => {
      setTimeout(() => {
        icon.classList.add("is-visible");
      }, 1000 + index * 400);
    });

    observer.unobserve(speakHuman);

  }, {
    threshold: 0.2
  });

  observer.observe(speakHuman);

}

  else {

    // PC：service_messageが画面に入ったら開始
    const observer = new IntersectionObserver((entries) => {

      if (!entries[0].isIntersecting) return;

      // ① 文字
      serviceMessage.classList.add("is-visible");

      // ② 人物
      setTimeout(() => {
        speakHuman.classList.add("is-visible");
      }, 400);

      // ③ 写真
      photos.forEach((photo, index) => {
        setTimeout(() => {
          photo.classList.add("is-visible");
        }, 1000 + index * 400);
      });

      // ④ アイコン
      icons.forEach((icon, index) => {
        setTimeout(() => {
          icon.classList.add("is-visible");
        }, 2400 + index * 400);
      });

      observer.unobserve(serviceMessage);

    }, {
      threshold: 0.2
    });

    observer.observe(serviceMessage);
  }

});

//三つを順に波のようにフェードアップさせる 
const threePoint = document.querySelector(".three_point");

if (threePoint) {
  const points = threePoint.querySelectorAll(":scope > div");

  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      points.forEach((point) => {
        point.classList.add("is-show");
      });

      observer.disconnect();
    }
  }, {
    threshold: 0,
    rootMargin: "0px 0px -20% 0px"
  });

  observer.observe(threePoint);
}

// 画像→三つのメッセージの順にフェードアップさせる
const secondContent = document.querySelector(".second_content");

if (secondContent) {
  const photo = secondContent.querySelector(".smile_tolk");
  const messages = secondContent.querySelectorAll(".three_message p");

  if (photo) {
    const observer = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {

        photo.classList.add("is-show");

        messages.forEach((message, index) => {
          setTimeout(() => {
            message.classList.add("is-show");
          }, 1800 + index * 500);
        });

        observer.disconnect();
      }
    }, {
      threshold: 0,
      rootMargin: "0px 0px -20% 0px"
    });

    observer.observe(secondContent);
  }
}

// 三つを順にフェードアップさせる
const powerPoint = document.querySelector(".power_point");

if (powerPoint) {
  const points = powerPoint.querySelectorAll(":scope > div");

  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {

      points.forEach((point) => {
        point.classList.add("is-show");
      });

      observer.disconnect();
    }
  }, {
    threshold: 0,
    rootMargin: "0px 0px -20% 0px"
  });

  observer.observe(powerPoint);
}