document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('order-table');
    const addBtn = document.getElementById('add-btn');
  
    addBtn.addEventListener('click', function() {
      addRow();
    });
  
    table.addEventListener('click', function(event) {
      const target = event.target;
  
      if (target.classList.contains('edit-btn')) {
        handleEdit(target);
      } else if (target.classList.contains('save-btn')) {
        handleSave(target);
      } else if (target.classList.contains('delete-btn')) {
        handleDelete(target);
      }
    });
  
    function addRow() {
      const newRow = table.insertRow();
      newRow.innerHTML = `
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="date"></td>
        <td>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
          <button class="save-btn">Save</button>
        </td>
      `;
    }
  
    function handleEdit(btn) {
      const row = btn.closest('tr');
      const cells = row.cells;
  
      for (let i = 0; i < cells.length - 1; i++) {
        cells[i].setAttribute('contenteditable', 'true');
      }
  
      btn.style.display = 'none'; 
      row.querySelector('.save-btn').style.display = 'inline-block';
    }
  
    function handleSave(btn) {
      const row = btn.closest('tr');
      const cells = row.cells;
  
      for (let i = 0; i < cells.length - 1; i++) {
        cells[i].setAttribute('contenteditable', 'false');
      }
  
      btn.style.display = 'none';
      row.querySelector('.edit-btn').style.display = 'inline-block'; 
    }
  
    function handleDelete(btn) {
      const row = btn.closest('tr');
      row.remove();
    }
  });
  