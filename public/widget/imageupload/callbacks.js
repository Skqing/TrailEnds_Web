/**
 * 开始上传
 */
function upload() {
  flashObj.upload();
  g("upload").style.display = "none";
}
/**
 * 选择文件后的回调函数
 * @param selectFiles
 */
function selectFileCallback(selectFiles) {
  imageCount += selectFiles.length;
  g("upload").style.display = "";
  g("upload").onclick = upload;
}
/**
 * 单个文件上传完成的回调函数
 * @param    Object/String    服务端返回啥，参数就是啥
 */
function uploadCompleteCallback(data) {
  console.log(data);
  try {
    var info = eval("(" + data.info + ")");
    info && imageUrls.push(info);
    imageCount--;
  } catch (e) {}
}

//全部上传完成的回调函数

function allCompleteCallback() {
  g("upload").style.display = "";
}
/**
 * 删除文件后的回调函数
 * @param    Array
 */
function deleteFileCallback(delFiles) {
  // 数组里单个元素为Object，{index:在多图上传的索引号, name:文件名, size:文件大小}
  // 其中size单位为Byte
  imageCount -= delFiles.length;
  if (imageCount == 0) {
    g("upload").style.display = "none";
  }
}


/*-=-=-=-=-=-=-=公共方法模块-=-=-=-=-=-=-*/
function g(id) {
  return document.getElementById(id);
}
function isNumber(n) {
  return /^[1-9]\d*$/.test(n);
}