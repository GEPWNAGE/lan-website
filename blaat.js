q0 = new double[3];
q0[0] = uVec[0] * (i - imageCenter) + vVec[0] * (j - imageCenter) + volumeCenter[0] - (volume.getDimX() * viewVector[0]);
q0[1] = uVec[1] * (i - imageCenter) + vVec[1] * (j - imageCenter) + volumeCenter[1] - (volume.getDimY() * viewVector[1]);
q0[2] = uVec[2] * (i - imageCenter) + vVec[2] * (j - imageCenter) + volumeCenter[2] - (volume.getDimZ() * viewVector[2]);

q1 = new double[3];
q1[0] = q0[0] + (volume.getDimX() * viewVector[0]);
q1[1] = q0[1] + (volume.getDimY() * viewVector[1]);
q1[2] = q0[2] + (volume.getDimZ() * viewVector[2]);