document.getElementById('select-btn').addEventListener('click', function() {
    const type = document.getElementById('post-type').value;
    fetch(`/admin_directory/api/get_post.php?type=${type}`)
        .then(res => res.json())
        .then(posts => {
            const list = document.getElementById('post-list');
            list.innerHTML = '';
            if (posts.length === 0) {
                list.innerHTML = '<p>投稿がありません。</p>';
                return;
            }
            posts.forEach(post => {
                const div = document.createElement('div');
                div.className = 'post-item';
                div.innerHTML = `<strong>${post.title}</strong> 
                                 <span class="date">(${post.year}${post.month_day})</span>`;
                div.addEventListener('click', () => {
                    window.location.href = `/admin_directory/edit_detail.php?id=${post.id}`;
                });
                list.appendChild(div);
            });
        })
        .catch(err => console.error("fetchエラー:", err));
});