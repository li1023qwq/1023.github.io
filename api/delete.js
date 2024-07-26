const fs = require('fs');
const path = require('path');

module.exports = (req, res) => {
  const { id } = req.query;
  const filePath = path.join(__dirname, '..', 'public', 'uploads', id);
  fs.unlink(filePath, (err) => {
    if (err) {
      res.status(500).json({ success: false });
      return;
    }
    res.status(200).json({ success: true });
  });
};
