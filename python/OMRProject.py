import cv2
import numpy as np
import utlis
import memory
import json
import random
import traceback
settingfile = open("settings/config.json" , "rt")
config_info = json.loads(settingfile.read())
question_detail = open("settings/question_detail.json" , "rt")
question_info = json.loads(question_detail.read())
########################################################################


def parseOMR(pathImage):
        global imgThres
        #while True:
        result = []
       
        img = cv2.imread(pathImage)
        img = cv2.resize(img, (config_info["widthImg"], config_info["heightImg"])) # RESIZE IMAGE
        imgFinal = img.copy()
        imgDebug = img.copy() # CREATE A BLANK IMAGE FOR TESTING DEBUGGING IF REQUIRED
        # ERROR CHANCES STARTS
        imgGray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY) # CONVERT IMAGE TO GRAY SCALE
        imgBlur = cv2.GaussianBlur(imgGray, (9, 9), 1) # ADD GAUSSIAN BLUR
        imgCanny = cv2.Canny(imgBlur,10,50) # APPLY CANNY
        #ERROR CHANCE END
        try:
            ## FIND CONTPURS IN IMAGE
            imgContours = img.copy() # COPY IMAGE FOR DISPLAY PURPOSES
            imgBigContour = img.copy() # COPY IMAGE FOR DISPLAY PURPOSES
            imgAllContour = img.copy()
            # ERROR CHANCES STARTS
            contours, hierarchy = cv2.findContours(imgCanny, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_NONE) # FIND ALL CONTOURS
            #ERROR CHANCE END
            cv2.drawContours(imgDebug, contours, -1, (0, 255, 0), 5)
            memory.save(imgDebug, name="Scanned/fullContours.jpg")
            #cv2.drawContours(imgCanny, contours, -1, (0, 255, 0), 5)
            #cv2.imshow("Contours" , imgContours)
            #cv2.waitKey(0)
            # at 0 index we have roll no
            #at 1 index we have section I
            #at 2 index we have section II
            # ERROR CHANCES STARTS
            rectCon = utlis.rectContour(contours , config_info["rectanglewidth"] , imgAllContour) # FILTER FOR RECTANGLE CONTOURS
            #ERROR CHANCES END
            print("Rect cont size is " + str(len(rectCon)))

            circles = []
            imgThres = []
            imgColoredWarp = []
            if len(rectCon)==3:
                i=0
                for rect in rectCon:
                    if (i == 0):
                        # i=0 means we are in roll number
                        row = 10
                        type = "roll"
                    else:
                        row = 20
                        if i == 1:
                            type = "Section I"
                        else:
                            type = "Section II"
                    # ERROR CHANCES STARTS
                    #size = cv2.contourArea(rect)
                    # Section I RECTANGLE WARPING

                    cornerpoints = utlis.getCornerPoints(rect)
                    # ERROR CHANCE END
                    rectpoint=utlis.reorder(cornerpoints) # REORDER FOR WARPING
                    cv2.drawContours(imgBigContour, rectpoint, -1, (0, 255, 0), 5) # DRAW THE BIGGEST CONTOUR
                    pts1 = np.float32(rectpoint) # PREPARE POINTS FOR WARP
                    pts2 = np.float32([[0, 0],[config_info["widthImg"], 0], [0, config_info["heightImg"]],[config_info["widthImg"],config_info["heightImg"]]]) # PREPARE POINTS FOR WARP
                    matrix = cv2.getPerspectiveTransform(pts1, pts2) # GET TRANSFORMATION MATRIX
                    memory.save(matrix , "Scanned/"+type+"/warp.jpg")
                    imgWarpColored = cv2.warpPerspective(img, matrix, (config_info["widthImg"], config_info["heightImg"])) # APPLY WARP PERSPECTIVE


                    # APPLY THRESHOLD
                    imgWarpGray = cv2.cvtColor(imgWarpColored,cv2.COLOR_BGR2GRAY) # CONVERT TO GRAYSCALE
                    memory.save(imgFinal , name="Scanned/final.jpg")
                    # ERROR CHANCES STARTS
                    imgThresh = cv2.threshold(imgWarpGray, 140, 255,cv2.THRESH_BINARY_INV )[1] # APPLY THRESHOLD AND INVERSE
                    # ERROR CHANCE END
                    memory.save(imgThresh, name="Scanned/thres.jpg")

                    imgColoredWarp.append(utlis.drawGrid(imgWarpColored, questions=row))
                    boxes = utlis.splitBoxes(imgThresh,row) # GET INDIVIDUAL BOXES
                    cv2.cvtColor(imgThresh, cv2.COLOR_GRAY2BGR)
                    imgThres.append(utlis.drawGrid(imgThresh, questions=row))
                    circles.append(boxes)

                    #cv2.imshow("Split Test ", boxes[0])
                    countR=0
                    countC=0
                    print("length of box is "+ str(len(boxes)))
                    myPixelVal = np.zeros(( int(len(boxes)/4), 4)) # TO STORE THE NON ZERO VALUES OF EACH BOX
                    #cv2.imshow(type, boxes[0])
                    for image in boxes:
                        #cv2.imshow(str(countR)+str(countC) +"-"+str(random.randint(100000,999999)) ,image)
                        # ERROR CHANCES STARTS
                        totalPixels = cv2.countNonZero(image)
                        # ERROR CHANCE END
                        #memory.save(image, name="Scanned/image.jpg")
                        myPixelVal[countR][countC]= totalPixels
                        countC += 1
                        if (countC==4):countC=0;countR +=1
                    print("MyPixelVal")
                    print(myPixelVal)
                    result.append(myPixelVal.tolist())
                    # FIND THE USER ANSWERS AND PUT THEM IN A LIST
                    myIndex=[]
                    percentageIndex = []
                    for x in range (0,int(len(boxes)/4)):
                        arr = myPixelVal[x]
                        total = sum(myPixelVal[x])
                        myIndexVal = np.where(arr == np.amax(arr))
                        fillarea = myPixelVal[x][myIndexVal[0][0]]
                        percentageIndex.append(float(fillarea)/float(total))
                        if fillarea > config_info["thresholdDark"]:
                            myIndex.append(myIndexVal[0][0])
                        else:
                            myIndex.append(-1)
                        #print(myIndexVal[0][0])

                    print("USER ANSWERS",myIndex)
                    print("maximum percentage", percentageIndex)
                    j=0
                    for integer in myIndex:
                        myIndex[j]=int(integer)
                        j+=1
                    #result.append(myIndex)
                    i+=1


                # DISPLAYING ANSWERS

                # IMAGE ARRAY FOR DISPLAY


                #cv2.imshow("Final Result", imgFinal)
            else:
                cv2.imshow("less than 3 rect found", imgDebug)

        except:
            pass


        try:
            #imageArray = ([imgThres[0], imgThres[1], imgThres[2], imgContours],
            #             [imgAllContour, imgThres[1], imgThres[2], imgWarpColored]
            #             )


            #stackedImage = utlis.stackImages(imageArray, 0.5)
            # cv2.imshow("Result",stackedImage)
            #saving the stacked image
            #memory.save(stackedImage , name="Scanned/stacked.jpg")
            cv2.resize(imgThres[1], (400,100))
            memory.save(imgThres[1], name="Scanned/secI.jpg")
            memory.save(imgFinal , name="Scanned/final.jpg")
            memory.save(imgCanny , name="Scanned/canny.jpg")
            memory.save(imgBlur, name="Scanned/blur.jpg")
        except Exception as e:
            traceback.print_exc()
            print("Failed to Save Image")
        #cv2.waitKey(0)
        #print(result)
        return json.dumps(result)

if __name__ =='__main__':
    result = parseOMR(config_info["pathImage"])
    print(result)