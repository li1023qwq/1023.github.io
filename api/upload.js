const { IncomingForm } = require('formidable');
const fs = require('fs');
const path = require('path');

module.exports = (req, res) => {
  const form = new IncomingForm();
  form.parse(req, (err, fields, files) => {
    if (err) {
      res.status(500).json({ success: false });
      return;
    }

    const oldPath = files.file.filepath;
    const newPath = path.join(__dirname, '..', 'public', 'uploads', files.file.originalFilename);

    fs.rename(oldPath, newPath, (err) => {
      if (err) {
        res.status(500).json({ success: false });
        return;
      }
      res.status(200).json({ success: true });
    });
  });
};
