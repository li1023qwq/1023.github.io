document.getElementById('uploadForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData();
    formData.append('file', document.getElementById('fileInput').files[0]);
  
    const response = await fetch('/api/upload', {
      method: 'POST',
      body: formData
    });
    const data = await response.json();
    if (data.success) {
      loadGallery();
    } else {
      alert('上传失败');
    }
  });
  
  async function loadGallery() {
    const response = await fetch('/api/gallery');
    const images = await response.json();
    const gallery = document.getElementById('gallery');
    gallery.innerHTML = '';
    images.forEach(image => {
      const div = document.createElement('div');
      div.classList.add('gallery-item');
      const img = document.createElement('img');
      img.src = image.url;
      div.appendChild(img);
      const deleteButton = document.createElement('button');
      deleteButton.innerText = '删除';
      deleteButton.onclick = () => deleteImage(image.id);
      div.appendChild(deleteButton);
      const editButton = document.createElement('button');
      editButton.innerText = '编辑';
      editButton.onclick = () => editImage(image.id);
      div.appendChild(editButton);
      gallery.appendChild(div);
    });
  }
  
  async function deleteImage(id) {
    const response = await fetch(`/api/delete?id=${id}`, { method: 'DELETE' });
    const data = await response.json();
    if (data.success) {
      loadGallery();
    } else {
      alert('删除失败');
    }
  }
  
  async function editImage(id) {
    const newUrl = prompt('输入新的图片URL');
    if (newUrl) {
      const response = await fetch(`/api/edit`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, url: newUrl })
      });
      const data = await response.json();
      if (data.success) {
        loadGallery();
      } else {
        alert('编辑失败');
      }
    }
  }
  
  document.addEventListener('DOMContentLoaded', loadGallery);
  