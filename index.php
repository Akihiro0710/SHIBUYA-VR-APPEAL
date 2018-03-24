<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>A-Frame で超簡単 AR</title>
</head>
<body>
<!-- A-Frame ライブラリの読み込み -->
<script src="https://aframe.io/releases/0.6.1/aframe.min.js"></script>
<!-- AR.js ライブラリの読み込み -->
<script src="https://jeromeetienne.github.io/AR.js/aframe/build/aframe-ar.js"></script>

<!-- A-Frame の VR空間に AR.js を紐づける（デバッグUIは非表示） -->
<a-scene embedded arjs="debugUIEnabled:false;">
  <!-- OBJ形式のCGモデルの読み込み -->
  <a-assets>
    <a-asset-item id="obj" src="assets/java/java.obj"></a-asset-item>   <!-- objファイル -->
    <a-asset-item id="mtl" src="assets/java/java.mtl"></a-asset-item>   <!-- mtlファイル -->
  </a-assets>
  <!-- マーカーを登録（プリセットされている「hiro」マーカー） -->
  <a-marker preset="hiro">
    <a-obj-model
        src="#obj"
        mtl="#mtl"
        scale="1 1 1"
        position="0 0 0">
      <a-animation
          attribute="rotation"
          to="0 360 0"
          dur="3000"
          easing="linear"
          repeat="indefinite">
      </a-animation>
    </a-obj-model>
  </a-marker>

  <!-- AR用のカメラを置く -->
  <a-entity camera></a-entity>
</a-scene>
<div id="like_button">
  いいね
</div>
</body>
<script>
  (function () {
    var countHolder = document.createElement('div');
    var count = 0;
    var button = document.getElementById('like_button');
    button.appendChild(countHolder);
    button.addEventListener('click', function () {
      count++;
      countHolder.innerText = count;
    })
  })();
</script>
</html>