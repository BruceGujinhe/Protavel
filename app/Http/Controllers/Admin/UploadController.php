<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * 文件上传
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postIndex(Request $request)
    {
        if ($request->hasFile('upload_file')) { // 判断文件是否存在

            $file = $request->file('upload_file'); // 获取文件实例

            if ($file->isValid()) { // 判断文件是否有效

                $ext = $file->getClientOriginalExtension(); // 获取文件拓展名

                switch ($ext) {
                    case 'jpg':
                        break;
                    case 'png':
                        break;
                    case 'gif':
                        break;
                    default:

                        return response()->json(['success' => false, 'message' => '格式不正确']);
                }

                $size = $file->getClientSize();

                if ($size > 2097152) { // 判断文件是否大于2mb

                    return response()->json(['success' => false, 'message' => '超过大小']);
                } else {

                    $file_name = md5(time() . md5($file->getClientOriginalName())) . '.' . $ext; // 生成文件名
                    $save_path = 'upload/' . $file_name; // 定义保存路径
                    Storage::put( // 文件写入
                        $save_path,
                        file_get_contents($file->getRealPath())
                    );

                    if (! Storage::exists($save_path)) { // 判断文件系统中是否存在

                        return response()->json(['success' => false, 'message' => '保存失败']);
                    } else {

                        return response()->json(['success' => true, 'message' => '上传成功', 'file_path' => asset('storage/' . $save_path)]);
                    }
                }
            } else {

                return response()->json(['success' => false, 'message' => '文件无效']);
            }
        } else {

            return response()->json(['success' => false, 'message' => '文件不存在']);
        }
    }
}
