function showNotification(type, message) {
    var notification = document.createElement('div');
    notification.className = 'notification ' + type;
    notification.innerText = message;
  
    var closeIcon = document.createElement('span');
    closeIcon.className = 'close-icon';
    closeIcon.innerHTML = '&times;'; // X character
  
    closeIcon.addEventListener('click', function() {
        closeNotification(notification);
    });
  
    notification.appendChild(closeIcon);
  
    var container = document.getElementById('notificationContainer');
    container.appendChild(notification);
  
    notification.style.display = 'block';
  }
  
  function closeNotification(notification) {
    notification.style.display = 'none';
    var container = document.getElementById('notificationContainer');
    container.removeChild(notification);
  }