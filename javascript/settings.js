const imgDiv = document.querySelector('.profile-pic-div')
const img = document.querySelector('.photo')
const file = document.querySelector('.file')
const uploadButton = document.querySelector('.upload-button')

imgDiv.addEventListener('mouseenter', function() {
    uploadButton.classList.add("mouseHover")
})

imgDiv.addEventListener('mouseleave', function() {
    uploadButton.classList.remove("mouseHover")
})

file.addEventListener('change', function() {
    const choosedPic = this.files[0];

    if (choosedPic) {
        const reader = new FileReader()

        reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result)
        })

        reader.readAsDataURL(choosedPic)
    }
})

function confirmDeletingUser() {
    let text = "Opravdu si přejete smazat Váš účet?"
    
    return confirm(text)
}