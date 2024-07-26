const fs = require('fs');
const path = require('path');

module.exports = (req, res) => {
  const { id, url } = req.body;
  const oldPath = path.join(__dirname, '..', 'public', 'uploads', id);
  const newPath = path.join(__dirname, '..', 'public', 'uploads', path.basename(url));

  fs.rename(oldPath, newPath, (err) => {
    if (err) {
      res.status(500).json({ success: false });
      return;
    }
    res.status(200).json({ success: true });
  });
};
