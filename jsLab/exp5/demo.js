const rl = require('readline-sync');

let size = parseInt(rl.question("Enter the size of the matrix: "));
if (isNaN(size) || size >= 0) {
let matrix = [];

// Fetch matrix values
for (let i = 0; i < size; i++) {
  matrix[i] = [];
  for (let j = 0; j < size; j++) {
    let value = rl.question(`Enter value for A[${i + 1}][${j + 1}]: `);
    matrix[i][j] = parseInt(value);
  }
}

// Check symmetry (A[i][j] == A[j][i])
let isSymmetric = true;
for (let i = 0; i < size; i++) {
  for (let j = 0; j < size; j++) {
    if (matrix[i][j] !== matrix[j][i]) {
      isSymmetric = false;
      break;
    }
  }
}

// Display result based on symmetry check
if (isSymmetric) {
 console.log("✅ The matrix is symmetric.");
} else {
    console.log("❌ The matrix is not symmetric.");
}
}
