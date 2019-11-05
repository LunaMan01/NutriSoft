function postForm(url, formToSend) {
    var req = new XMLHttpRequest();
    req.open("POST", url, false);
    req.send(formToSend);
    return req.responseText;
}
  
  const post = (url, data) => {
    var req = new XMLHttpRequest();
    req.open("POST", url, false);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(data);
    return req.responseText;
  }