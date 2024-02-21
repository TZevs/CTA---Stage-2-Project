// Tabs on the transfer page.
function openTransfers(evt, transferOptions) {
    var i, tabcontent, tablinks;
  
    // Hides tab contents
    tabcontent = document.getElementsByClassName("transfer-tab-content");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    // Find tab links and and remove the class active
    tablinks = document.getElementsByClassName("transfer-tab-links");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab and add the active class
    document.getElementById(transferOptions).style.display = "block";
    evt.currentTarget.className += " active";
  }
