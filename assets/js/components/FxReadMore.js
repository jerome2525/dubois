const readMoreBoxes = document.querySelectorAll('.read-more__box');

    readMoreBoxes.forEach(item => {

      const elBtn = item.querySelector('.js-read-more-expand'),
          elContent = item.querySelector('.js-read-more')

        if( null !== elBtn && null !== elContent ) {

          elBtn.addEventListener( 'click', () => {
            const state = elContent.classList.contains('is-expanded')
            if( state ) {
              elBtn.innerText = 'Read More'
              elContent.classList.remove('is-expanded')
            } else {
              elBtn.innerText = 'Read Less'
              elContent.classList.add('is-expanded')
            }
          })
        }
    })

