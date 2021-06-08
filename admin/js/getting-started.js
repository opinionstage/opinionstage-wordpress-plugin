jQuery(document).ready(function ($){
  $('body').on('click', 'a:not([data-ignore-swal-js])', function(e){
    e.preventDefault()
    swal({
      title: opinionstageGettingStarted.swal.title,
      text: opinionstageGettingStarted.swal.text,
      icon: 'warning',
      buttons: [opinionstageGettingStarted.swal.ButtonCancel, opinionstageGettingStarted.swal.ButtonLeave],
    }).then((isLeave) => {
      var target = $(this).attr('target')
      var href = $(this).attr('href')
      if (isLeave) {
        if (target !== undefined) {
          window.open(href, target)
        } else {
          window.location.href = href
        }
      }
    })
  })
})
