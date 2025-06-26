<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ตารางแชร์ พ.ย. 2568 (รอบที่ 18)</title>
  <style>
    body { font-family: 'Sarabun', sans-serif; padding: 20px; background-color: #f9f9f9; }
    h2 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    th { background-color: #e0e0e0; }
    tfoot td { font-weight: bold; background-color: #f0f0f0; }
  </style>
</head>
<body>
  <h2>ตารางแชร์ พฤศจิกายน 2568 (รอบที่ 18)</h2>

  <table id="shareTable">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อผู้เล่น</th>
        <th>เงินต้น (บาท)</th>
        <th>ดอกเบี้ย (บาท)</th>
      </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <tr>
        <td colspan="2">รวม</td>
        <td id="sumPrincipal">-</td>
        <td id="sumInterest">-</td>
      </tr>
    </tfoot>
  </table>

  <script>
    fetch('data.json')
      .then(res => res.json())
      .then(data => {
        const tbody = document.querySelector('#shareTable tbody');
        let sumPrincipal = 0;
        let sumInterest = 0;

        data.forEach(row => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${row.no}</td>
            <td>${row.name}</td>
            <td>${row.principal.toLocaleString()}</td>
            <td>${row.interest.toLocaleString()}</td>
          `;
          tbody.appendChild(tr);
          sumPrincipal += row.principal;
          sumInterest += row.interest;
        });

        document.getElementById('sumPrincipal').textContent = sumPrincipal.toLocaleString();
        document.getElementById('sumInterest').textContent = sumInterest.toLocaleString();
      })
      .catch(err => {
        document.getElementById('shareTable').insertAdjacentHTML('afterend', '<p>⚠️ โหลดข้อมูลไม่สำเร็จ</p>');
        console.error('โหลด data.json ไม่ได้:', err);
      });
  </script>
</body>
</html>
