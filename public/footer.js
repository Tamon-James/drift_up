fetch('common/footer.html')
    .then(response => response.text())
    .then(data => {
        const footerContainer = document.createElement('div');
        footerContainer.innerHTML = data;
        document.body.appendChild(footerContainer);
    })

    .catch(error => console.error('フッターの読み込みに失敗',error));