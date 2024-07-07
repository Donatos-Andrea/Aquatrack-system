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
        <td contenteditable="true">ORXXX</td>
        <td contenteditable="true">CXXX</td>
        <td contenteditable="true">PXXX</td>
        <td contenteditable="true">0</td>
        <td contenteditable="true">0</td>
        <td contenteditable="true">0</td>
        <td contenteditable="true">yyyy-mm-dd</td>
        <td>
          <button class="edit-btn">Edit</button>
          <button class="delete-btn">Delete</button>
        </td>
      `;
    }
  
    function handleEdit(btn) {
      const row = btn.closest('tr');
      const cells = row.cells;
  
      for (let i = 0; i < cells.length - 1; i++) {
        cells[i].setAttribute('contenteditable', 'true');
      }
  
      btn.textContent = 'Save';
      btn.classList.remove('edit-btn');
      btn.classList.add('save-btn');
    }
  
    function handleSave(btn) {
      const row = btn.closest('tr');
      const cells = row.cells;
  
      for (let i = 0; i < cells.length - 1; i++) {
        cells[i].setAttribute('contenteditable', 'false');
      }
  
      btn.textContent = 'Edit';
      btn.classList.remove('save-btn');
      btn.classList.add('edit-btn');
    }
  
    function handleDelete(btn) {
      const row = btn.closest('tr');
      row.remove();
    }
  });
  