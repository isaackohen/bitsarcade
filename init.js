const util = require('util');
const exec = util.promisify(require('child_process').exec);
process.chdir('/var/www/html/');
async function lsWithGrep() {
  try {
      const { stdout, stderr } = await exec('bash /var/www/html/start.sh');
      console.log('stdout:', stdout);
      console.log('stderr:', stderr);
  } catch (err) {
     console.error(err);
  };
};
lsWithGrep();

console.log('Success');